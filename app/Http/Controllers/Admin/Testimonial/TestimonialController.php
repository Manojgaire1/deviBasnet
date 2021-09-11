<?php

namespace App\Http\Controllers\Admin\Testimonial;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends AdminBaseController
{
    protected $testimonial;
    protected $data = array();
    protected $selectedTestimonial;
    protected $upload_image_dir = "uploads/testimonials";

    public function __construct(Testimonial $type){
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
            $testimonials = Testimonial::orderBy('id','desc');
            return Datatables($testimonials)
            ->addColumn('image_path',function($testimonial){
                if($testimonial->featured_image != null)
                    return asset('storage/uploads/testimonials/small'.'/'.$testimonial->featured_image);
                return asset('/admin-assets/images/user.png');
            })
            ->addColumn('action', function ($testimonial) {
                $return_html = '<div class="dropdown">' .
                    '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>' .
                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >' .
                    '<ul>' .
                    '<li><button class="dropdown-item edit-btn" data-testimonial-id = "'.$testimonial->id.'" href = "#" > Edit</button ></li >'.
                    '<li ><a class="dropdown-item delete-btn" href = "#" data-testimonial-id = '.$testimonial->id.' > Delete</a ></li >'.
                    '</ul >'.
                    '</div ></div >';
                return $return_html;

            })->rawColumns(['action','description'])
            ->make();
        else:
            return view('admin.testimonial.index');
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
        if($request->hasFile("testimonial_image_path")):
            $image = $this->uploadImage($request->file('testimonial_image_path'),$thumbnail=true,$this->upload_image_dir);
            $data['image_path'] = $image;

        endif;
        //save the Type in database
        $this->selectedTestimonial  = $this->type->addTestimonial($data);
        if($this->selectedTestimonial):
            return response()->json(array('status' => 'success','message' => 'Testimonial has been created successfully','title' => 'Successfully created'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Testimonial cannot be created, please try again','title' => 'Failed'),200);
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
        $this->selectedTestimonial = $this->type::findOrFail($id);
        if($this->selectedTestimonial):
            return response()->json(array('status' => 'success', 'testimonial' => $this->selectedTestimonial,'message' => 'Testimonial has been fetched successfully!'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Testimonial does not exist in the server'),404);
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
        $this->selectedTestimonial  = $this->type->where('id',$id)->first();
        $data = $request->except('_token');
         //check the image has been uploaded or not
         if($request->hasFile("testimonial_image_path")):
            //upload the image and their various thumbnails
            $image = $this->uploadImage($request->file('testimonial_image_path'),$thumbnail=true,$this->upload_image_dir);
            //remove the doucmentpat
            //need to remove the old image from the directory
            $this->removeImages($this->upload_image_dir,$this->selectedTestimonial->featured_image);
            $data['image_path'] = $image;
        endif;
        //update the record in the storage
        $this->selectedTestimonial  = $this->type->updateTestimonial($data,$id);
        //send the response back to the client as per the db response
        if($this->selectedTestimonial):
            return response()->json(array('status' => 'success','message' => 'Testimonial has been updated successfully','title' => 'Successfully updated'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Testimonial cannot be updated, please try again','title' => 'Update failed'),200);
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
        $this->selectedTestimonial = $this->type->where('id',$id)->first();
        if($this->selectedTestimonial):
            $testimonial_image = $this->selectedTestimonial->featured_image;
            //check the types have activity or not
            if($this->selectedTestimonial->destroy($id)):
                if($testimonial_image != null):
                    //remove the old images
                    $this->removeImages($this->upload_image_dir,$testimonial_image);
                endif;
                // send the response back to the client with the success message
                return response()->json(array('status' => 'success', 'message' => 'Testimonial has been deleted successfully','title' => 'Testimonial deleted!'),200);
            else:
                //send the failed  message to teh client that the menu cannot be deleted
                return response()->json(array('status' => 'failed', 'message' => 'Testimonial cannot be deleted, please try again','title' => 'Deletion failed!'),200);
            endif;

            return response()->json(array('status' => 'failed','message' => 'Testimonial does not exists, please try again'),404);
        endif;
    }
}
