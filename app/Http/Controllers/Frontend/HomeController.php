<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Activity;
use App\Models\Timeline;
use App\Models\Blog;

class HomeController extends Controller
{
    //
    public function index(){
        //get the active types
        $types = Type::where('status','1')->select('id','title','slug')->get();
        //get timelines
        $timelines = Timeline::where('status','1')->orderBy('sort_order','asc')->get();
        //get the active activities
        $activities = Activity::join('types','types.id','activities.type_id')
        ->select('activities.id','activities.title as activity_title','activities.description','activities.featured_image','activities.documents_path','types.title','types.slug')
        ->where('activities.status','1')
        ->get();

        //get the active blogs
        $blogs   = Blog::where('status','1')->select('id','slug','title','featured_image','content','external_link')->get();
        return view('frontend.index')->with([
            'types'         => $types,
            'activities'    => $activities,
            'timelines'     => $timelines,
            'blogs'         => $blogs
        ]);
    }
}
