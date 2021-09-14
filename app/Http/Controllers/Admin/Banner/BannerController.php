<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Admin\AdminBaseController;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends AdminBaseController
{
    protected $banner;
    protected $data = array();
    protected $upload_image_dir = "uploads/banners";
    protected $selectedBanner;

    //load the dependency
    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function index(Request $request)
    {
        if ($request->ajax()):
            $banners = Banner::all();
            return Datatables($banners)
                ->addColumn('featured_image', function ($banner) {
                    if ($banner->featured_image != null) {
                        return asset('storage/uploads/banners/small' . '/' . $banner->featured_image);
                    }

                    return asset('/admin-assets/images/user-profile/2012_Councelling_Roka_2.png');
                })
                ->addColumn('action', function ($banner) {
                    $return_html = '<div class="dropdown">' .

                    '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>' .
                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >' .
                    '<ul>' .
                    '<li><button class="dropdown-item edit-btn" data-banner-id = "' . $banner->id . '" href = "#" > Edit</button ></li >' .
                    '<li ><a class="dropdown-item delete-btn" href = "#" data-banner-id = ' . $banner->id . ' > Delete</a ></li >' .
                        '</ul >' .
                        '</div ></div >';
                    return $return_html;
                })->rawColumns(['action'])
                ->make();
        endif;

        return view('admin.banner.index');
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
        if ($request->hasFile("banner_image_path")):
            $image = $this->uploadImage($request->file('banner_image_path'), $thumbnail = true, $this->upload_image_dir);
            $data['image_path'] = $image;

        endif;

        //save the banner in database
        $this->selectedBanner = $this->banner->addbanner($data);
        if ($this->selectedBanner):
            return response()->json(array('status' => 'success', 'message' => 'Banner has been created successfully', 'title' => 'Successfully created'), 200);
        else:
            return response()->json(array('status' => 'failed', 'message' => 'Banner cannot be created, please try again', 'title' => 'Failed'), 200);
        endif;
    }
    public function edit($id)
    {
        //
        $this->selectedBanner = $this->banner::findOrFail($id);
        if ($this->selectedBanner):
            return response()->json(array('status' => 'success', 'banner' => $this->selectedBanner, 'message' => 'Banner has been fetched successfully!'), 200);
        else:
            return response()->json(array('status' => 'failed', 'message' => 'Banner does not exist in the server'), 404);
        endif;
    }
    public function update(Request $request, $id)
    {
        //get the make by id
        $this->selectedBanner = $this->banner->where('id', $id)->first();
        $data = $request->except('_token');
        //check the image has been uploaded or not
        if ($request->hasFile("banner_image_path")):
            //upload the image and their various thumbnails
            $image = $this->uploadImage($request->file('banner_image_path'), $thumbnail = true, $this->upload_image_dir);
            //remove the doucmentpat
            //need to remove the old image from the directory
            $this->removeImages($this->upload_image_dir, $this->selectedBanner->featured_image);
            $data['image_path'] = $image;
        endif;

        //update the record in the storage
        $this->selectedBanner = $this->banner->updatebanner($data, $id);
        //send the response back to the client as per the db response
        if ($this->selectedBanner):
            return response()->json(array('status' => 'success', 'message' => 'banner has been updated successfully', 'title' => 'Successfully updated'), 200);
        else:
            return response()->json(array('status' => 'failed', 'message' => 'banner cannot be updated, please try again', 'title' => 'Update failed'), 200);
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
        $this->selectedBanner = $this->banner->where('id', $id)->first();
        if ($this->selectedBanner):
            //remove the old images
            $banner_image = $this->selectedBanner->featured_image;
            if ($this->selectedBanner->destroy($id)):
                if ($banner_image != null):
                    //remove the old images
                    $this->removeImages($this->upload_image_dir, $banner_image);
                endif;
                // send the response back to the client with the success message
                return response()->json(array('status' => 'success', 'message' => 'banner has been deleted successfully', 'title' => 'banner deleted!'), 200);
            else:
                //send the failed  message to teh client that the menu cannot be deleted
                return response()->json(array('status' => 'failed', 'message' => 'banner cannot be deleted, please try again', 'title' => 'Deletion failed!'), 200);
            endif;
        else:
            return response()->json(array('status' => 'failed', 'message' => 'banner does not exists, please try again'), 404);

        endif;
    }
}
