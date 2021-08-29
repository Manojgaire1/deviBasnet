  <!-- EXPERIENCE -->
  @if($timelines->count() > 0)
  <section id="experience">
        <div class="section-header">
            <div>
                <h2>My Career timeline</h2>
            </div>
        </div>
        <div class="container">
            @foreach($timelines as $timeline)
            <div class="timeline-block timeline-block-{{$timeline->position}}">
                <div class="marker"></div>
                <div class="timeline-content">
                    <h3>{{$timeline->title}}</h3>
                    <span>{{Carbon\Carbon::parse($timeline->start_date)->format('Y')}} - @if(isset($timeline->end_date)){{Carbon\Carbon::parse($timeline->end_date)->format('Y')}}@else{{'Present'}}@endif</span>
                    {!! $timeline->description !!}
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- EXPERIENCE END -->
@endif