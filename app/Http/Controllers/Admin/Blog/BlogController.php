<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends AdminBaseController
{
    protected $blog;
    protected $data = array();
    protected $upload_image_dir = "uploads/blogs";
    protected $selectedBlog;

    //load the dependency
    public function __construct(Blog $blog){
        $this->blog = $blog;
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if($request->ajax()):
            $blogs = Blog::join('categories','categories.id','blogs.category_id')->select('blogs.id','blogs.title as blog_title','blogs.status','blogs.featured_image','categories.title')->orderBy('id','desc');
            return Datatables($blogs)
            ->addColumn('image_path',function($blog){
                if($blog->featured_image != null)
                    return asset('storage/uploads/blogs/small'.'/'.$blog->featured_image);
                return asset('/admin-assets/images/user-profile/2012_Councelling_Roka_2.png');
            })
            ->addColumn('action', function ($blog) {
                $return_html = '<div class="dropdown">' .

                    '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>' .
                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >' .
                    '<ul>' .
                    '<li><button class="dropdown-item edit-btn" data-blog-id = "'.$blog->id.'" href = "#" > Edit</button ></li >'.
                    '<li ><a class="dropdown-item delete-btn" href = "#" data-blog-id = '.$blog->id.' > Delete</a ></li >'.
                    '</ul >'.
                    '</div ></div >';
                return $return_html;
            })->rawColumns(['action','description'])
            ->make();
        else:
            $categories =  Category::where('status','1')->select('id','title')->get();
            return view('admin.blog.index')->with([
                'categories'  => $categories
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
        if($request->hasFile("category_image_path")):
            $image = $this->uploadImage($request->file('category_image_path'),$thumbnail=true,$this->upload_image_dir);
            $data['image_path'] = $image;

        endif;
        //save the activity in database
        $this->selectedBlog  = $this->blog->addBlog($data);
        if($this->selectedBlog):
            return response()->json(array('status' => 'success','message' => 'Blog has been created successfully','title' => 'Successfully created'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Blog cannot be created, please try again','title' => 'Failed'),200);
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
        $this->selectedBlog = $this->blog::findOrFail($id);
        if($this->selectedBlog):
            return response()->json(array('status' => 'success', 'blog' => $this->selectedBlog,'message' => 'Activity has been fetched successfully!'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Blog does not exist in the server'),404);
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
        $this->selectedBlog  = $this->blog->where('id',$id)->first();
        $data = $request->except('_token');
        //check the image has been uploaded or not
        if($request->hasFile("category_image_path")):
            //upload the image and their various thumbnails
            $image = $this->uploadImage($request->file('category_image_path'),$thumbnail=true,$this->upload_image_dir);
            //remove the doucmentpat
            //need to remove the old image from the directory
            $this->removeImages($this->upload_image_dir,$this->selectedBlog->featured_image);
            $data['image_path'] = $image;
        endif;

        //update the record in the storage
        $this->selectedBlog  = $this->blog->updateBlog($data,$id);
        //send the response back to the client as per the db response
        if($this->selectedBlog):
            return response()->json(array('status' => 'success','message' => 'Blog has been updated successfully','title' => 'Successfully updated'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Blog cannot be updated, please try again','title' => 'Update failed'),200);
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
        $this->selectedBlog = $this->blog->where('id',$id)->first();
        if($this->selectedBlog):
                //remove the old images
                $blog_image = $this->selectedBlog->featured_image;
                if($this->selectedBlog->destroy($id)):
                    if($blog_image != null):
                        //remove the old images
                        $this->removeImages($this->upload_image_dir,$blog_image);
                    endif;
                    // send the response back to the client with the success message
                    return response()->json(array('status' => 'success', 'message' => 'Blog has been deleted successfully','title' => 'Blog deleted!'),200);
                else:
                    //send the failed  message to teh client that the menu cannot be deleted
                    return response()->json(array('status' => 'failed', 'message' => 'Blog cannot be deleted, please try again','title' => 'Deletion failed!'),200);
                endif;
        else:
            return response()->json(array('status' => 'failed','message' => 'Blog does not exists, please try again'),404);

        endif;
    }
}
