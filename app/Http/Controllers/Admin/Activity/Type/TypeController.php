<?php

namespace App\Http\Controllers\Admin\Activity\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    protected $type;
    protected $data = array();
    protected $selectedType;


    public function __construct(Type $type){
        $this->type = $type;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()):
            $zen_types = Type::orderBy('id','desc');
            return Datatables($zen_types)
            ->addColumn('action', function ($zen_type) {

                $return_html = '<div class="dropdown">' .

                    '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>' .
                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >' .
                    '<ul>' .
                    '<li><button class="dropdown-item edit-btn" data-type-id = "'.$zen_type->id.'" href = "#" > Edit</button ></li >'.
                    '<li ><a class="dropdown-item delete-btn" href = "#" data-type-id = '.$zen_type->id.' > Delete</a ></li >'.
                    '</ul >'.
                    '</div ></div >';
                return $return_html;

            })->rawColumns(['action','description'])
            ->make();
        else:
            return view('admin.activity.type.index');
        endif;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //save the Type in database
        $this->selectedType  = $this->type->addType($data);
        if($this->selectedType):
            return response()->json(array('status' => 'success','message' => 'Type has been created successfully','title' => 'Successfully created'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Type cannot be created, please try again','title' => 'Failed'),200);
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
        $this->selectedType = $this->type::findOrFail($id);
        if($this->selectedType):
            return response()->json(array('status' => 'success', 'Type' => $this->selectedType,'message' => 'Type has been fetched successfully!'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Type does not exist in the server'),404);
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
        //
        //get the make by id
        $this->selectedType  = $this->type->where('id',$id)->first();
        $data = $request->except('_token');
        //update the record in the storage
        $this->selectedType  = $this->type->updateType($data,$id);
        //send the response back to the client as per the db response
        if($this->selectedType):
            return response()->json(array('status' => 'success','message' => 'Type has been updated successfully','title' => 'Successfully updated'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Type cannot be updated, please try again','title' => 'Update failed'),200);
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
        $this->selectedType = $this->type->where('id',$id)->first();
        if($this->selectedType):
            //check the category have foods or not
            if($this->selectedType->vehicles()->count() > 0):
                return response()->json(array('status' => 'failed','message' => 'Type cannot be deleted because it have vehicles on it, delete the vehicle first','title' => 'Deletion failed!'),200);
            else:
                //remove the old images
                $make_image = $this->selectedType->image;
                if($this->selectedType->destroy($id)):
                    if($make_image != null):
                        //remove the old images
                        $this->removeImages($this->upload_image_dir,$make_image);
                    endif;
                    // send the response back to the client with the success message
                    return response()->json(array('status' => 'success', 'message' => 'Type has been deleted successfully','title' => 'Make deleted!'),200);
                else:
                    //send the failed  message to teh client that the menu cannot be deleted
                    return response()->json(array('status' => 'failed', 'message' => 'Type cannot be deleted, please try again','title' => 'Deletion failed!'),200);
                endif;

            endif;

        else:
            return response()->json(array('status' => 'failed','message' => 'Type does not exists, please try again'),404);

        endif;
    }
}
