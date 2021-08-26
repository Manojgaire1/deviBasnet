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
                                    <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Use space</span>
                                    <h4>49/50GB</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Get more space
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                		<div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                                    <span class="text-c-pink f-w-600">Revenue</span>
                                    <h4>$23,589</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Last 24 hours
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                                    <span class="text-c-green f-w-600">Fixed issue</span>
                                    <h4>45</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Tracked from microsoft
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
	                        <div class="card widget-card-1">
	                            <div class="card-block-small">
	                                <i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
	                                <span class="text-c-yellow f-w-600">Followers</span>
	                                <h4>+562</h4>
	                                <div>
	                                    <span class="f-left m-t-10 text-muted">
	                                        <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"></i>Just update
	                                    </span>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-8 col-xl-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Statistics</h5>
                                    <div class="card-header-left ">
                                    </div>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="icofont icofont-simple-left "></i></li>
                                            <li><i class="icofont icofont-maximize full-card"></i></li>
                                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                                            <li><i class="icofont icofont-error close-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div id="statestics-chart" style="height: 330px; overflow: hidden; text-align: left;"><div class="amcharts-main-div" style="position: relative;"><div class="amcharts-chart-div" style="overflow: hidden; position: relative; text-align: left; width: 731px; height: 330px; padding: 0px; cursor: default; touch-action: auto;"><svg version="1.1" style="position: absolute; width: 731px; height: 330px; top: -0.399994px; left: -0.199982px;"><desc>JavaScript chart by amCharts 3.21.5</desc><g><path cs="100,100" d="M0.5,0.5 L730.5,0.5 L730.5,329.5 L0.5,329.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0"></path><path cs="100,100" d="M0.5,0.5 L696.5,0.5 L696.5,294.5 L0.5,294.5 L0.5,0.5 Z" fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0" transform="translate(34,0)"></path></g><g><g transform="translate(34,0)"></g><g transform="translate(34,0)" visibility="visible"><g><path cs="100,100" d="M0.5,294.5 L0.5,294.5 L696.5,294.5" fill="none" stroke-width="1" stroke-dasharray="6" stroke-opacity="0.1" stroke="#000000"></path></g><g><path cs="100,100" d="M0.5,245.5 L0.5,245.5 L696.5,245.5" fill="none" stroke-width="1" stroke-dasharray="6" stroke-opacity="0.1" stroke="#000000"></path></g><g><path cs="100,100" d="M0.5,196.5 L0.5,196.5 L696.5,196.5" fill="none" stroke-width="1" stroke-dasharray="6" stroke-opacity="0.1" stroke="#000000"></path></g><g><path cs="100,100" d="M0.5,147.5 L0.5,147.5 L696.5,147.5" fill="none" stroke-width="1" stroke-dasharray="6" stroke-opacity="0.1" stroke="#000000"></path></g><g><path cs="100,100" d="M0.5,98.5 L0.5,98.5 L696.5,98.5" fill="none" stroke-width="1" stroke-dasharray="6" stroke-opacity="0.1" stroke="#000000"></path></g><g><path cs="100,100" d="M0.5,49.5 L0.5,49.5 L696.5,49.5" fill="none" stroke-width="1" stroke-dasharray="6" stroke-opacity="0.1" stroke="#000000"></path></g><g><path cs="100,100" d="M0.5,0.5 L0.5,0.5 L696.5,0.5" fill="none" stroke-width="1" stroke-dasharray="6" stroke-opacity="0.1" stroke="#000000"></path></g></g></g><g transform="translate(34,0)" clip-path="url(#AmChartsEl-3)"><g visibility="hidden"><g transform="translate(272,0)" visibility="hidden"><rect x="0.5" y="0.5" width="77" height="294" rx="0" ry="0" stroke-width="0" fill="#FC6180" stroke="#FC6180" fill-opacity="0" stroke-opacity="0" transform="translate(-40,0)"></rect></g></g></g><g></g><g></g><g></g><g><g transform="translate(34,0)"><g clip-path="url(#AmChartsEl-6)"><path cs="100,100" d="M39,246 C58,244,78,202,116,202 C155,202,154,246,193,246 C232,247,232,212,271,214 C310,215,310,277,348,274 C387,271,386,164,425,152 C464,140,464,34,503,39 C542,44,542,251,580,256 C619,261,638,148,657,142 M0,0 L0,0" fill="none" fill-opacity="0" stroke-width="2" stroke-opacity="1" stroke="#4680ff"></path></g><g clip-path="url(#AmChartsEl-5)"><path cs="100,100" d="M39,246 C58,244,78,202,116,202 C155,202,154,246,193,246 C232,247,232,212,271,214 C310,215,310,277,348,274 C387,271,386,164,425,152 C464,140,464,34,503,39 C542,44,542,251,580,256 C619,261,638,148,657,142 M0,0 L0,0" fill="none" fill-opacity="0" stroke-width="2" stroke-opacity="1" stroke="#4680ff"></path></g><clipPath id="AmChartsEl-5"><rect x="0" y="0" width="696" height="294" rx="0" ry="0" stroke-width="0"></rect></clipPath><clipPath id="AmChartsEl-6"><rect x="0" y="294" width="696" height="1" rx="0" ry="0" stroke-width="0"></rect></clipPath><g></g></g></g><g></g><g><path cs="100,100" d="M0.5,294.5 L696.5,294.5 L696.5,294.5" fill="none" stroke-width="1" stroke-dasharray="6" stroke-opacity="0.2" stroke="#000000" transform="translate(34,0)"></path><g><path cs="100,100" d="M0.5,0.5 L696.5,0.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" transform="translate(34,294)"></path></g><g><path cs="100,100" d="M0.5,0.5 L0.5,294.5" fill="none" stroke-width="1" stroke-opacity="0" stroke="#000000" transform="translate(34,0)" visibility="visible"></path></g></g><g><g transform="translate(34,0)" clip-path="url(#AmChartsEl-4)" style="pointer-events: none;"><path cs="100,100" d="M0.5,0.5 L696.5,0.5 L696.5,0.5" fill="none" stroke-width="1" stroke-opacity="false" stroke="#FC6180" visibility="hidden" transform="translate(0,84)"></path></g><clipPath id="AmChartsEl-4"><rect x="0" y="0" width="696" height="294" rx="0" ry="0" stroke-width="0"></rect></clipPath></g><g></g><g><g transform="translate(34,0)"><circle r="4.5" cx="0" cy="0" fill="#4680ff" stroke="#4680ff" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(39,246) scale(1)" aria-label=" Jan 0.98"></circle><circle r="4.5" cx="0" cy="0" fill="#4680ff" stroke="#4680ff" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(116,202) scale(1)" aria-label=" Feb 1.87"></circle><circle r="4.5" cx="0" cy="0" fill="#4680ff" stroke="#4680ff" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(193,246) scale(1)" aria-label=" Mar 0.97"></circle><circle r="4.5" cx="0" cy="0" fill="#4680ff" stroke="#4680ff" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(271,214) scale(1)" aria-label=" Apr 1.64"></circle><circle r="4.5" cx="0" cy="0" fill="#4680ff" stroke="#4680ff" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(348,274) scale(1)" aria-label=" May 0.4"></circle><circle r="4.5" cx="0" cy="0" fill="#4680ff" stroke="#4680ff" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(425,152) scale(1)" aria-label=" Jun 2.9"></circle><circle r="4.5" cx="0" cy="0" fill="#4680ff" stroke="#4680ff" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(503,39) scale(1)" aria-label=" Jul 5.2"></circle><circle r="4.5" cx="0" cy="0" fill="#4680ff" stroke="#4680ff" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(580,256) scale(1)" aria-label=" Aug 0.77"></circle><circle r="4.5" cx="0" cy="0" fill="#4680ff" stroke="#4680ff" fill-opacity="1" stroke-width="2" stroke-opacity="0" transform="translate(657,142) scale(1)" aria-label=" Sap 3.1"></circle></g></g><g><g></g></g><g><g transform="translate(34,0)" visibility="visible"><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(39,311.5)"><tspan y="6" x="0">Jan</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(116,311.5)"><tspan y="6" x="0">Feb</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(193,311.5)"><tspan y="6" x="0">Mar</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(271,311.5)"><tspan y="6" x="0">Apr</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(348,311.5)"><tspan y="6" x="0">May</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(425,311.5)"><tspan y="6" x="0">Jun</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(503,311.5)"><tspan y="6" x="0">Jul</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(580,311.5)"><tspan y="6" x="0">Aug</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="middle" transform="translate(657,311.5)"><tspan y="6" x="0">Sap</tspan></text></g><g transform="translate(34,0)" visibility="visible"><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(-12,292.6953125)"><tspan y="6" x="0">0</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(-12,243.6953125)"><tspan y="6" x="0">1</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(-12,194.6953125)"><tspan y="6" x="0">2</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(-12,145.6953125)"><tspan y="6" x="0">3</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(-12,96.6953125)"><tspan y="6" x="0">4</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(-12,47.6953125)"><tspan y="6" x="0">5</tspan></text><text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1" text-anchor="end" transform="translate(-12,-1.3046875)"><tspan y="6" x="0">6</tspan></text></g></g><g></g><g transform="translate(34,0)"></g><g></g><g></g><clipPath id="AmChartsEl-3"><rect x="-1" y="-1" width="698" height="296" rx="0" ry="0" stroke-width="0"></rect></clipPath></svg></div></div></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-4">
                        	<div clas="row">
                        		 <div class="col-md-12 col-xl-12">
	                        <div class="card widget-statstic-card">
	                            <div class="card-header">
	                                <div class="card-header-left">
	                                    <h5>New orders</h5>
	                                    <p class="p-t-10 m-b-0 text-c-yellow">54% From last month</p>
	                                </div>
	                            </div>
	                            <div class="card-block">
	                                <i class="icofont icofont-chart-line st-icon bg-c-yellow"></i>

	                                <div class="text-left">
	                                    <h3 class="d-inline-block">5,456</h3>
	                                    <i class="icofont icofont-long-arrow-up text-c-green f-30 "></i>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-12 col-xl-12">
	                        <div class="card widget-statstic-card">
	                            <div class="card-header">
	                                <div class="card-header-left">
	                                    <h5>Unique visitor</h5>
	                                    <p class="p-t-10 m-b-0 text-c-pink">55% from last 28 hours</p>
	                                </div>
	                            </div>
	                            <div class="card-block">
	                                <i class="icofont icofont-users-social st-icon bg-c-pink txt-lite-color"></i>

	                                <div class="text-left">
	                                    <h3 class="d-inline-block">3,874</h3>
	                                    <i class="icofont icofont-long-arrow-down text-c-pink f-30 "></i>
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