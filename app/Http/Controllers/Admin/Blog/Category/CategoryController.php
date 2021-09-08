<?php

namespace App\Http\Controllers\Admin\Blog\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    protected $category;
    protected $data = array();
    protected $selectedCategory;


    public function __construct(Category $category){
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()):
            $categories = Category::orderBy('id','desc');
            return Datatables($categories)
            ->addColumn('total_blog',function($category){
                return $category->blogs()->count();
            })
            ->addColumn('action', function ($category) {
                $return_html = '<div class="dropdown">' .
                    '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>' .
                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >' .
                    '<ul>' .
                    '<li><button class="dropdown-item edit-btn" data-category-id = "'.$category->id.'" href = "#" > Edit</button ></li >'.
                    '<li ><a class="dropdown-item delete-btn" href = "#" data-category-id = '.$category->id.' > Delete</a ></li >'.
                    '</ul >'.
                    '</div ></div >';
                return $return_html;

            })->rawColumns(['action','description'])
            ->make();
        else:
            return view('admin.blog.category.index');
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
        $this->selectedCategory  = $this->category->addCategory($data);
        if($this->selectedCategory):
            return response()->json(array('status' => 'success','message' => 'Category has been created successfully','title' => 'Successfully created'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Category cannot be created, please try again','title' => 'Failed'),200);
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
        $this->selectedCategory = $this->category::findOrFail($id);
        if($this->selectedCategory):
            return response()->json(array('status' => 'success', 'category' => $this->selectedCategory,'message' => 'Category has been fetched successfully!'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Category does not exist in the server'),404);
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
        $this->selectedCategory  = $this->category->where('id',$id)->first();
        $data = $request->except('_token');
        //update the record in the storage
        $this->selectedCategory  = $this->category->updateCategory($data,$id);
        //send the response back to the client as per the db response
        if($this->selectedCategory):
            return response()->json(array('status' => 'success','message' => 'Category has been updated successfully','title' => 'Successfully updated'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Category cannot be updated, please try again','title' => 'Update failed'),200);
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
        $this->selectedCategory = $this->category->where('id',$id)->first();
        if($this->selectedCategory):
            //check the types have activity or not
            if($this->selectedCategory->blogs()->count() > 0):
                return response()->json(array('status' => 'failed', 'message' => 'Category cannot be deleted, because it has blog','title' => 'Deletion failed!'),200);
            else:
                if($this->selectedCategory->destroy($id)):
                    // send the response back to the client with the success message
                    return response()->json(array('status' => 'success', 'message' => 'Category has been deleted successfully','title' => 'Category deleted!'),200);
                else:
                    //send the failed  message to teh client that the menu cannot be deleted
                    return response()->json(array('status' => 'failed', 'message' => 'Category cannot be deleted, please try again','title' => 'Deletion failed!'),200);
                endif;
            endif;
            return response()->json(array('status' => 'failed','message' => 'Category does not exists, please try again'),404);
        endif;
    }
}
