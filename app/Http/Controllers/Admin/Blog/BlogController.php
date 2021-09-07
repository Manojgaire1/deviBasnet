<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
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
                    return asset('/uploads/blogs/small'.'/'.$activity->blog);
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
            return view('admin.activity.index')->with([
                'categories'  => $categories
            ]);
        endif;
    }
}
