<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Activity;
use App\Models\Timeline;
use App\Models\Type;


class DashboardController extends Controller
{
    //
    protected $totalActivity        = 0;
    protected $totalBlogs           = 0;
    protected $totalActivityType    = 0;
    protected $totalTimeline        = 0;

    /**
     * function to show the list page
     * @param void
     */
    public function index(){
        $this->totalActivity        = Activity::where('status','1')->get()->count();
        $this->totalBlogs           = Blog::where('status','1')->get()->count();
        $this->totalActivityType    = Type::where('status','1')->get()->count();
        $this->totalTimeline        = Timeline::where('status','1')->get()->count();
        return view('admin.dashboard.index')->with([
            'totalActivity'       => $this->totalActivity,
            'totalBlogs'          => $this->totalBlogs,
            'totalActivityType'   => $this->totalActivityType,
            'totalTimeline'       => $this->totalTimeline,
        ]);
    }
}
