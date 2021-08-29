<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Activity;

class HomeController extends Controller
{
    //
    public function index(){
        //get the active types
        $types = Type::where('status','1')->select('id','title')->get();
        //get the active activities
        $activities = Activity::join('types','types.id','activities.type_id')
        ->select('activities.id','activities.title','activities.description','activities.featured_image','activities.documents_path','types.title')
        ->where('activities.status','1')
        ->get();
        return view('frontend.index')->with([
            'types'         => $types,
            'activities'    => $activities
        ]);
    }
}
