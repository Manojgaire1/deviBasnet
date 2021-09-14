<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\PageDetail;
use Illuminate\Http\Request;

class PageDetailController extends Controller
{
    protected $page_detail;
    protected $data = array();
    protected $selectedPageDetail;

    //load the dependency
    public function __construct(PageDetail $page_detail)
    {
        $this->page_detail = $page_detail;
    }
    public function index(Request $request)
    {
        if ($request->ajax()):
            $page_details = PageDetail::orderBy('created_at', 'desc');
            return Datatables($page_details)

                ->addColumn('page', function ($page_detail) {
                    return $page_detail->page->title;

                })
                ->addColumn('meta_key', function ($page_detail) {
                    return $page_detail->meta_key;

                })
                ->addColumn('meta_value', function ($page_detail) {
                    return strip_tags(substr($page_detail->meta_value, 0, 400));
                })

                ->addColumn('action', function ($page_detail) {
                    $return_html = '<div class="dropdown">' .

                    '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>' .
                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >' .
                    '<ul>' .
                    '<li><button class="dropdown-item edit-btn" data-page-detail-id = "' . $page_detail->id . '" href = "#" > Edit</button ></li >' .
                    '<li ><a class="dropdown-item delete-btn" href = "#" data-page-detail-id = ' . $page_detail->id . ' > Delete</a ></li >' .
                        '</ul >' .
                        '</div ></div >';
                    return $return_html;
                })
                ->escapeColumns(['content'])
                ->rawColumns(['action'])
                ->make();
        endif;

        return view('admin.page.page-detail');
    }

    public function store(Request $request)
    {
        //
        $data = $request->except("_token");
        //save the banner in database
        $this->selectedPageDetail = $this->page_detail->addpagedetail($data);

        if ($this->selectedPageDetail):
            return response()->json(array('status' => 'success', 'message' => 'Page detail has been created successfully', 'title' => 'Successfully created'), 200);
        else:
            return response()->json(array('status' => 'failed', 'message' => 'Page detail cannot be created, please try again', 'title' => 'Failed'), 200);
        endif;
    }
    public function edit($id)
    {
        //
        $this->selectedPageDetail = $this->page_detail::findOrFail($id);
        if ($this->selectedPageDetail):
            return response()->json(array('status' => 'success', 'page_detail' => $this->selectedPageDetail, 'message' => 'Page detail has been fetched successfully!'), 200);
        else:
            return response()->json(array('status' => 'failed', 'message' => 'Page detail does not exist in the server'), 404);
        endif;
    }
    public function update(Request $request, $id)
    {
        //get the make by id
        $this->selectedPageDetail = $this->page_detail->where('id', $id)->first();
        $data = $request->except('_token');

        //update the record in the storage
        $this->selectedPageDetail = $this->page_detail->updatepagedetail($data, $id);
        // dd($this->selectedPageDetail->id);
        //send the response back to the client as per the db response
        if ($this->selectedPageDetail):
            return response()->json(array('status' => 'success', 'message' => 'Page detail has been updated successfully', 'title' => 'Successfully updated'), 200);
        else:
            return response()->json(array('status' => 'failed', 'message' => 'Page detail cannot be updated, please try again', 'title' => 'Update failed'), 200);
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
        $this->selectedPageDetail = $this->page_detail->where('id', $id)->first();
        if ($this->selectedPageDetail):
            //remove the old images
            $this->selectedPageDetail->destroy($id);
            return response()->json(array('status' => 'success', 'message' => 'Page detail has been deleted successfully', 'title' => 'Page detail deleted!'), 200);

        else:
            return response()->json(array('status' => 'failed', 'message' => 'Page detail does not exists, please try again'), 404);

        endif;
    }

}
