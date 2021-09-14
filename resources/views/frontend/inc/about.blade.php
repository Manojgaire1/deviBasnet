<!-- ABOUT -->
<section id="about">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12">
                <div class="photo-wrap">
                    @if(isset($about))
                    <img src="{{asset('storage/uploads/pages/large' . '/' . $about->featured_image)}}" class="photo"
                        alt="" />
                    @else
                    <img src="{{asset('front-assets/img/photo.png')}}" class="photo" alt="" />

                    @endif

                    <div class="photo-overlay">
                        <div class="photo-text social">
                            <a href="{{$social_facebook_link}}" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="{{$social_linkedin_link}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="{{$social_twitter_link}}" target="_blank"><i class="fa fa-twitter"></i></a>
                            <!-- <a href="#"><i class="fa fa-tumblr"></i></a> -->
                            <a href="{{$social_gate_link}}" target="_blank"><img
                                    src="{{asset('front-assets/img/gate.svg')}}"
                                    class="img-fluid social_gate_icon svg"></a>
                            <a href="{{$social_instagram_link}}" target="_blank"><i class="fa fa-instagram"></i></a>
                            <!-- <a href="#"><i class="fa fa-youtube"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div id="aboutRight" class="col-lg-6 col-12">
                <div>
                    <!-- <h4>Hello! I am Devi</h4> -->
                    <h2>ABOUT ME</h2>
                </div>
                @if(isset($about))
                <div>
                    {!! $about->content !!}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- ABOUT END -->