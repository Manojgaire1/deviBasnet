<?php

namespace App\Http\Controllers\Admin\Timeline;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timeline;
use Carbon\Carbon;

class TimelineController extends Controller
{
    //
    protected $timeline;
    protected $data = array();
    protected $selectedTimeline;


    public function __construct(Timeline $timeline){
        $this->timeline = $timeline;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()):
            $timelines = Timeline::orderBy('id','desc');
            return Datatables($timelines)
            ->addColumn('start_date',function($timeline){
                return Carbon::parse($timeline->start_date)->format('Y');
            })
            ->addColumn('end_date',function($timeline){
                return Carbon::parse($timeline->end_date)->format('Y');
            })
            ->addColumn('position',function($timeline){
                return ucfirst($timeline->position);
            })
            ->addColumn('action', function ($timeline) {
                $return_html = '<div class="dropdown">' .
                    '<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more-alt"></i></button>' .
                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >' .
                    '<ul>' .
                    '<li><button class="dropdown-item edit-btn" data-timeline-id = "'.$timeline->id.'" href = "#" > Edit</button ></li >'.
                    '<li ><a class="dropdown-item delete-btn" href = "#" data-timeline-id = '.$timeline->id.' > Delete</a ></li >'.
                    '</ul >'.
                    '</div ></div >';
                return $return_html;

            })->rawColumns(['action','description'])
            ->make();
        else:
            return view('admin.timeline.index');
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
        $this->selectedTimeline  = $this->timeline->addTimeline($data);
        if($this->selectedTimeline):
            return response()->json(array('status' => 'success','message' => 'Timeline has been created successfully','title' => 'Successfully created'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Timeline cannot be created, please try again','title' => 'Failed'),200);
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
        $this->selectedTimeline = $this->timeline::findOrFail($id);
        $this->selectedTimeline->start_date = Carbon::parse($this->selectedTimeline->start_date)->format('Y');
        $this->selectedTimeline->end_date  = Carbon::parse($this->selectedTimeline->end_date)->format('Y');
        if($this->selectedTimeline):
            return response()->json(array('status' => 'success', 'timeline' => $this->selectedTimeline,'message' => 'Timeline has been fetched successfully!'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Timeline does not exist in the server'),404);
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
        $this->selectedTimeline  = $this->timeline->where('id',$id)->first();
        $data = $request->except('_token');
        //update the record in the storage
        $this->selectedTimeline  = $this->timeline->updateTimeline($data,$id);
        //send the response back to the client as per the db response
        if($this->selectedTimeline):
            return response()->json(array('status' => 'success','message' => 'Timeline has been updated successfully','title' => 'Successfully updated'),200);
        else:
            return response()->json(array('status' => 'failed','message' => 'Timeline cannot be updated, please try again','title' => 'Update failed'),200);
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
        $this->selectedTimeline = $this->timeline->where('id',$id)->first();
        if($this->selectedTimeline):
                if($this->selectedTimeline->destroy($id)):
                    // send the response back to the client with the success message
                    return response()->json(array('status' => 'success', 'message' => 'Timeline has been deleted successfully','title' => 'Timeline deleted!'),200);
                else:
                    //send the failed  message to teh client that the menu cannot be deleted
                    return response()->json(array('status' => 'failed', 'message' => 'Timeline cannot be deleted, please try again','title' => 'Deletion failed!'),200);
                endif;
            return response()->json(array('status' => 'failed','message' => 'Timeline does not exists, please try again'),404);
        endif;
    }
}
