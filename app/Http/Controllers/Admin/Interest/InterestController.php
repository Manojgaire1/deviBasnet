<?php

namespace App\Http\Controllers\Admin\Interest;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Interest;

class InterestController extends AdminBaseController
{
    protected $interest;
    protected $data = array();
    protected $upload_image_dir = "uploads/interests";
    protected $upload_image_hover_dir = "uploads/interests/hover";
    protected $selectedInterest;
    

    //load the dependency
    public function __construct(Interest $interest){
        $this->interest = $interest;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if($request->ajax()):
            $interests = Interest::orderBy('id','desc');
            return Datatables($interests)
            ->addColumn('icon_path',function($interest){
                if($interest->icon_path != null)
                    return asset('storage/uploads/interests'.'/'.$interest->icon_path);
                return asset('/admin-assets/images/user.png');
            })
            ->addColumn('hover_icon_path',function($interest){
                if($interest->hover_icon_path != null)
                    return asset('storage/uploads/interests/hover'.'/'.$interest->hover_icon_path);
                return asset('/admin-assets/images/user.png');
            })
            ->addColumn('action', function ($interest) {
                $return_html = '<div class="dropdown">' .

                    '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>' .
                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >' .
                    '<ul>' .
                    '<li><button class="dropdown-item edit-btn" data-interest-id = "'.$interest->id.'" href = "#" > Edit</button ></li >'.
                    '<li ><a class="dropdown-item delete-btn" href = "#" data-interest-id = '.$interest->id.' > Delete</a ></li >'.
                    '</ul >'.
                    '</div ></div >';
                return $return_html;
            })->rawColumns(['action','description'])
            ->make();
        else:
            return view('admin.interest.index');
        endif;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->except("_token");
        //check the request have the image or not 
        if($request->hasFile("icon_path")):
            $image = $this->uploadImage($request->file('icon_path'),$thumbnail=false,$this->upload_image_dir);
            $data['image_path'] = $image;

        endif;
        if($request->hasFile("hover_icon_path")):
            $hover_image = $this->uploadImage($request->file('hover_icon_path'),$thumbnail=false,$this->upload_image_hover_dir);
            $data['hover_image_path'] = $hover_image;
        endif;
        
        //save the activity in database
        $this->selectedInterest  = $this->interest->addInterest($data);
        if($this->selectedInterest):
            return response()->json(array('status' => 'success','message' => 'Interest has been created successfully','title' => 'Successfully created'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Interest cannot be created, please try again','title' => 'Failed'),200);
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $this->selectedInterest = $this->interest::findOrFail($id);
        if($this->selectedInterest):
            return response()->json(array('status' => 'success', 'interest' => $this->selectedInterest,'message' => 'Interest has been fetched successfully!'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Interest does not exist in the server'),404);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //get the make by id
        $this->selectedInterest  = $this->interest->where('id',$id)->first();
        $data = $request->except('_token');
        //check the image has been uploaded or not
        if($request->hasFile("icon_path")):
            //upload the image and their various thumbnails
            $image = $this->uploadImage($request->file('icon_path'),$thumbnail=false,$this->upload_image_dir);
            //remove the doucmentpat
            //need to remove the old image from the directory
            $this->removeImages($this->upload_image_dir,$this->selectedInterest->icon_path);
            $data['image_path'] = $image;
        endif;

        //check the doucment has been updated or not
        if($request->hasFile("hover_icon_path")):
            //upload the image and their various thumbnails
            $image = $this->uploadImage($request->file('hover_icon_path'),$thumbnail=false,$this->upload_image_hover_dir);
            //remove the doucmentpat
            //need to remove the old image from the directory
            $this->removeImages($this->upload_image_hover_dir,$this->selectedInterest->hover_icon_path);
            $data['hover_image_path'] = $image;
        endif;
        //update the record in the storage
        $this->selectedInterest  = $this->interest->updateInterest($data,$id);
        //send the response back to the client as per the db response
        if($this->selectedInterest):
            return response()->json(array('status' => 'success','message' => 'Interest has been updated successfully','title' => 'Successfully updated'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Interest cannot be updated, please try again','title' => 'Update failed'),200);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->selectedInterest = $this->interest->where('id',$id)->first();
        if($this->selectedInterest):
                //remove the old images
                $icon_image         = $this->selectedInterest->icon_path;
                $hover_icon_image   = $this->selectedInterest->hover_icon_path;
                if($this->selectedInterest->destroy($id)):
                    if($icon_image != null):
                        //remove the old images
                        $this->removeImages($this->upload_image_dir,$icon_image);
                    endif;
                    if($hover_icon_image != null):
                        //remove the old images
                        $this->removeImages($this->upload_image_hover_dir,$hover_icon_image);
                    endif;
                    // send the response back to the client with the success message
                    return response()->json(array('status' => 'success', 'message' => 'Interest has been deleted successfully','title' => 'Interest deleted!'),200);
                else:
                    //send the failed  message to teh client that the menu cannot be deleted
                    return response()->json(array('status' => 'failed', 'message' => 'Interest cannot be deleted, please try again','title' => 'Deletion failed!'),200);
                endif;
        else:
            return response()->json(array('status' => 'failed','message' => 'Interest does not exists, please try again'),404);

        endif;
    }
}
