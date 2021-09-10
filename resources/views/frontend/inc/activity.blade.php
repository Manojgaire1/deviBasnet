 <!-- PORTFOLIO -->
 <section id="portfolio">
        <div class="section-header">
            <div>
                <h2>My Activities</h2>
            </div>
        </div>
        <div class="container">
            @if($types->count() > 0)
            <div id="filters-group">
                @foreach($types as $type)
                    <a class="filter" data-filter=".{{$type->slug}}">{{$type->title}}</a>
                @endforeach
            </div>
            @endif
            @if($activities->count() > 0)
            <div id="portfolio-items" class="row">
                @foreach($activities as $activity)
                <div class="item @if($activity->slug == 'social'){{'col-md-4 col-lg-2'}}@else{{'col-md-4 col-lg-2'}}@endif {{$activity->slug}}" data-category="{{$activity->slug}}">
                    <a title="{!! $activity->description !!}"
                       data-rel="prettyPhoto"
                       href="{{asset('storage/uploads/activities/'.$activity->featured_image)}}">
                        <div class="item-wrap">
                            <img class="img-fluid" src="{{asset('storage/uploads/activities/'.$activity->featured_image)}}" alt="{{$activity->activity_title}}">
                        </div>
                        <span class="magnifier"></span>
                    </a>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <!-- PORTFOLIO END -->