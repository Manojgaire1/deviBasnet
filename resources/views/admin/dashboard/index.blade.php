@extends('admin.layouts.master')
@section('page_title','Dashboard')
@section('content')
<div class="pcoded-content vehicle">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                	<div class="row">
                		<div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-layout bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Blogs</span>
                                    <h4>{{$totalBlogs}}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Add more blog
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                		<div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                                    <span class="text-c-pink f-w-600">Activity</span>
                                    <h4>{{$totalActivity}}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Last 1 month
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-bars bg-c-green card1-icon"></i>
                                    <span class="text-c-green f-w-600">Timeline</span>
                                    <h4>{{$totalTimeline}}</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Added from CV
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
	                        <div class="card widget-card-1">
	                            <div class="card-block-small">
	                                <i class="icofont icofont-cubes bg-c-yellow card1-icon"></i>
	                                <span class="text-c-yellow f-w-600">Activity Type</span>
	                                <h4>+{{$totalActivityType}}</h4>
	                                <div>
	                                    <span class="f-left m-t-10 text-muted">
	                                        <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"></i>Just update
	                                    </span>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                	</div>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection