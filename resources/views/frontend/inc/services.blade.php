 <!-- SERVICES -->
 @if($interests->count() > 0)
 <section id="services">
        <div class="section-header">
            <div>
                <h2>My interests</h2>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    @foreach($interests as $interest)
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box">
                            <div class="circle">
                                <img class="img-fluid img-default" src="{{asset('storage/uploads/interests/'.$interest->icon_path)}}" alt="">
                                <img class="img-fluid img-hover" src="{{asset('storage/uploads/interests/hover/'.$interest->hover_icon_path)}}" alt="">
                            </div>
                            <h3>{{$interest->title}}</h3>
                            {!! $interest->description !!}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- SERVICES END -->
    @endif