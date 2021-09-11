 <!-- TESTIMONIALS -->
 <section id="testimonials" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="100">
        <div class="section-header">
            <div>
                <h2>What peoples say</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="testimonials-content" class="col-12">
                    @foreach($testimonials as $testimonial)
                    <div class="gallery-cell">
                        <div class="testimonial">
                            @if($testimonial->featured_image != null)
                            <img class="testimonial-avatar"
                                 src="{{asset('storage/uploads/testimonials/'.$testimonial->featured_image)}}" alt="{{$testimonial->client_name}}">
                            @else
                            <img class="testimonial-avatar"
                                 src="{{asset('front-assets/img/client.png')}}" alt="">
                            @endif
                            <q class="testimonial-quote">{!! $testimonial->description !!}</q>
                            <span class="testimonial-author">{{$testimonial->client_name}},{{$testimonial->position.' ' .$testimonial->company_name}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- TESTIMONIALS END -->