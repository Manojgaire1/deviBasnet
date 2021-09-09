<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Type;

class ActivityController extends AdminBaseController
{
    //
    protected $activity;
    protected $data = array();
    protected $upload_image_dir = "uploads/activities";
    protected $upload_doc_dir   = "uploads/activities/doc";
    protected $selectedActivity;
    

    //load the dependency
    public function __construct(Activity $activity){
        $this->activity = $activity;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if($request->ajax()):
            $activities = Activity::join('types','types.id','activities.type_id')->select('activities.id','activities.title as activity_title','activities.status','activities.featured_image','types.title')->orderBy('id','desc');
            return Datatables($activities)
            ->addColumn('image_path',function($activity){
                if($activity->featured_image != null)
                    return asset('storage/uploads/activities/small'.'/'.$activity->featured_image);
                return asset('/admin-assets/images/user-profile/2012_Councelling_Roka_2.png');
            })
            ->addColumn('action', function ($activity) {
                $return_html = '<div class="dropdown">' .

                    '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>' .
                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >' .
                    '<ul>' .
                    '<li><button class="dropdown-item edit-btn" data-activity-id = "'.$activity->id.'" href = "#" > Edit</button ></li >'.
                    '<li ><a class="dropdown-item delete-btn" href = "#" data-activity-id = '.$activity->id.' > Delete</a ></li >'.
                    '</ul >'.
                    '</div ></div >';
                return $return_html;
            })->rawColumns(['action','description'])
            ->make();
        else:
            $types =  Type::where('status','1')->select('id','title')->get();
            return view('admin.activity.index')->with([
                'types'  => $types
            ]);
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
        if($request->hasFile("activity_image_path")):
            $image = $this->uploadImage($request->file('activity_image_path'),$thumbnail=true,$this->upload_image_dir);
            $data['image_path'] = $image;

        endif;
        if($request->hasFile("activity_doc")):
            $document = $this->uploadImage($request->file('activity_doc'),$thumbnail=false,$this->upload_doc_dir);
            $data['activitiy_doc'] = $document;
        endif;
        
        //save the activity in database
        $this->selectedActivity  = $this->activity->addActivity($data);
        if($this->selectedActivity):
            return response()->json(array('status' => 'success','message' => 'Activity has been created successfully','title' => 'Successfully created'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Activity cannot be created, please try again','title' => 'Failed'),200);
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
        $this->selectedActivity = $this->activity::findOrFail($id);
        if($this->selectedActivity):
            return response()->json(array('status' => 'success', 'activity' => $this->selectedActivity,'message' => 'Activity has been fetched successfully!'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Activity does not exist in the server'),404);
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
        $this->selectedActivity  = $this->activity->where('id',$id)->first();
        $data = $request->except('_token');
        //check the image has been uploaded or not
        if($request->hasFile("activity_image_path")):
            //upload the image and their various thumbnails
            $image = $this->uploadImage($request->file('activity_image_path'),$thumbnail=true,$this->upload_image_dir);
            //remove the doucmentpat
            //need to remove the old image from the directory
            $this->removeImages($this->upload_image_dir,$this->selectedActivity->featured_images);
            $data['image_path'] = $image;
        endif;

        //check the doucment has been updated or not
        if($request->hasFile("activity_doc")):
            //upload the image and their various thumbnails
            $image = $this->uploadImage($request->file('activity_doc'),$thumbnail=false,$this->upload_doc_dir);
            //remove the doucmentpat
            //need to remove the old image from the directory
            $this->removeImages($this->upload_doc_dir,$this->selectedActivity->documents_path);
            $data['activitiy_doc'] = $image;
        endif;
        //update the record in the storage
        $this->selectedActivity  = $this->activity->updateActivity($data,$id);
        //send the response back to the client as per the db response
        if($this->selectedActivity):
            return response()->json(array('status' => 'success','message' => 'Activity has been updated successfully','title' => 'Successfully updated'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Activity cannot be updated, please try again','title' => 'Update failed'),200);
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
        $this->selectedActivity = $this->activity->where('id',$id)->first();
        if($this->selectedActivity):
                //remove the old images
                $activity_image = $this->selectedActivity->featured_image;
                $activity_doc   = $this->selectedActivity->documents_path;
                if($this->selectedActivity->destroy($id)):
                    if($activity_image != null):
                        //remove the old images
                        $this->removeImages($this->upload_image_dir,$activity_image);
                    endif;
                    if($activity_doc != null):
                        //remove the old images
                        $this->removeImages($this->upload_doc_dir,$activity_doc);
                    endif;
                    // send the response back to the client with the success message
                    return response()->json(array('status' => 'success', 'message' => 'Activity has been deleted successfully','title' => 'Activity deleted!'),200);
                else:
                    //send the failed  message to teh client that the menu cannot be deleted
                    return response()->json(array('status' => 'failed', 'message' => 'Activity cannot be deleted, please try again','title' => 'Deletion failed!'),200);
                endif;
        else:
            return response()->json(array('status' => 'failed','message' => 'Activity does not exists, please try again'),404);

        endif;
    }
}
