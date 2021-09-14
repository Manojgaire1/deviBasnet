<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Admin\AdminBaseController;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends AdminBaseController
{
    protected $page;
    protected $data = array();
    protected $upload_image_dir = "uploads/pages";
    protected $selectedPage;

    //load the dependency
    public function __construct(Page $page)
    {
        $this->page = $page;
    }
    public function index(Request $request)
    {
        if ($request->ajax()):
            $pages = Page::orderBy('created_at', 'desc');
            return Datatables($pages)
                ->addColumn('featured_image', function ($page) {
                    if ($page->featured_image != null) {
                        return asset('storage/uploads/pages/small' . '/' . $page->featured_image);
                    }

                    return asset('/admin-assets/images/user-profile/2012_Councelling_Roka_2.png');
                })
                ->addColumn('content', function ($page) {
                    return strip_tags(substr($page->content, 0, 400));

                })

                ->addColumn('action', function ($page) {
                    $return_html = '<div class="dropdown">' .

                    '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>' .
                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >' .
                    '<ul>' .
                    '<li><button class="dropdown-item edit-btn" data-page-id = "' . $page->id . '" href = "#" > Edit</button ></li >' .
                    '<li ><a class="dropdown-item delete-btn" href = "#" data-page-id = ' . $page->id . ' > Delete</a ></li >' .
                        '</ul >' .
                        '</div ></div >';
                    return $return_html;
                })
                ->escapeColumns(['content'])
                ->rawColumns(['action'])
                ->make();
        endif;

        return view('admin.page.index');
    }

    public function about()
    {
        $slug = 'about-me';
        $about = Page::where('slug', $slug)->first();
        return view('admin.page.about')->with(['about' => $about]);
    }
    public function addPage(Request $request)
    {
        //
        $data = $request->except("_token");
        //check the request have the image or not
        if ($request->hasFile("page_image_path")):
            $image = $this->uploadImage($request->file('page_image_path'), $thumbnail = true, $this->upload_image_dir);
            $data['image_path'] = $image;

        endif;

        //save the banner in database
        $this->selectedPage = $this->page->addpage($data);
        $last_page = Page::orderBy('created_at', 'desc')->first();

        if ($this->selectedPage):
            return response()->json(array('status' => 'success', 'message' => 'Page has been created successfully', 'title' => 'Successfully created', 'page_id' => $last_page->id), 200);
        else:
            return response()->json(array('status' => 'failed', 'message' => 'Page cannot be created, please try again', 'title' => 'Failed'), 200);
        endif;
    }
    public function edit($id)
    {
        //
        $this->selectedPage = $this->page::findOrFail($id);
        if ($this->selectedPage):
            return response()->json(array('status' => 'success', 'page' => $this->selectedPage, 'message' => 'Page has been fetched successfully!'), 200);
        else:
            return response()->json(array('status' => 'failed', 'message' => 'Page does not exist in the server'), 404);
        endif;
    }
    public function updatePage(Request $request, $id)
    {
        //get the make by id
        $this->selectedPage = $this->page->where('id', $id)->first();
        $data = $request->except('_token');
        //check the image has been uploaded or not
        if ($request->hasFile("page_image_path")):
            //upload the image and their various thumbnails
            $image = $this->uploadImage($request->file('page_image_path'), $thumbnail = true, $this->upload_image_dir);
            //remove the doucmentpat
            //need to remove the old image from the directory
            $this->removeImages($this->upload_image_dir, $this->selectedPage->featured_image);
            $data['image_path'] = $image;
        endif;

        //update the record in the storage
        $this->selectedPage = $this->page->updatepage($data, $id);
        // dd($this->selectedPage->id);
        //send the response back to the client as per the db response
        if ($this->selectedPage):
            return response()->json(array('status' => 'success', 'message' => 'Page has been updated successfully', 'title' => 'Successfully updated', 'page_id' => $this->selectedPage->id), 200);
        else:
            return response()->json(array('status' => 'failed', 'message' => 'Page cannot be updated, please try again', 'title' => 'Update failed'), 200);
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
        $this->selectedPage = $this->page->where('id', $id)->first();
        if ($this->selectedPage):
            //remove the old images
            $page_image = $this->selectedPage->featured_image;
            if ($this->selectedPage->destroy($id)):
                if ($page_image != null):
                    //remove the old images
                    $this->removeImages($this->upload_image_dir, $page_image);
                endif;
                // send the response back to the client with the success message
                return response()->json(array('status' => 'success', 'message' => 'page has been deleted successfully', 'title' => 'page deleted!'), 200);
            else:
                //send the failed  message to teh client that the menu cannot be deleted
                return response()->json(array('status' => 'failed', 'message' => 'page cannot be deleted, please try again', 'title' => 'Deletion failed!'), 200);
            endif;
        else:
            return response()->json(array('status' => 'failed', 'message' => 'page does not exists, please try again'), 404);

        endif;
    }
    public function all()
    {
        $pages = Page::select('id', 'title')->get();
        return \response(['status' => 'success', 'result' => $pages]);
    }
}
