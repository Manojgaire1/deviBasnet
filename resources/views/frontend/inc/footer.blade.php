</div>

<div id="footer-wrap">

    <!-- CONTACT INFO  -->
    <!-- <div id="contact2">
        <div class="container">
            <div class="row withMap">
                <div class="col-12 col-md-8">
                    <div id="googleMap"></div>
                </div>
                <div class="col-12 col-md-4">
                    <div>
                        <i class="fa fa-map-marker"> </i>223 John Adam Street, London, UK.
                    </div>
                    <div>
                        <i class="fa fa-phone"> </i>800 123-456-789
                    </div>
                    <div>
                        <i class="fa fa-envelope"> </i>your@email.com
                    </div>
                    <div class="mapinfo">
                        <p>Donec quis tincidunt nisl. Mauris ac urna libero. Aliquam cursus, augue eu efficitur dignissim,
                            risus mauris porta diam, in bibendum lectus enim vitae risus. Maecenas sit amet pretium quam, in
                            tristique ante. Sed consequat rutrum metus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- CONTACT INFO END -->

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <p>Copyright &copy; {{date('Y')}} Dr. Devi Bahadur Basnet</p>
                </div>
                <div class="col-12 col-sm-6 social">
                    <p class="pull-right">
                        <a href="{{$social_facebook_link}}" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="{{$social_linkedin_link}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="{{$social_twitter_link}}" target="_blank"><i class="fa fa-twitter"></i></a>
                        <!-- <a href="#"><i class="fa fa-tumblr"></i></a> -->
                        <a href="{{$social_gate_link}}" target="_blank"><img src="{{asset('front-assets/img/gate.svg')}}" class="img-fluid social_gate_icon svg"></a>
                        <a href="{{$social_instagram_link}}" target="_blank"><i class="fa fa-instagram"></i></a>
                        <!-- <a href="#"><i class="fa fa-youtube"></i></a> -->
                        <a href="https://www.facebook.com/inkwalkar" target="_blank" style="margin-left:50px;">Designed by Inkwalkar</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->

</div>
@if(!session()->has('show_modal'))
@php(session()->put('show_modal',true))
@if(Request::is('/'))
<div id="custom__modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">NRNA ELECTION 2021 - AGENDAS AND SHORT INFO</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
				<div class="row">
                    <div class="col-md-6">
                        <div class="image-content-block text-center">
                            <h2>AGENDAS</h2>
                            <div class="image-block">
                                <img src="{{asset('front-assets/img/dbb1.png')}}" alt="">
                            </div>
                            <!-- <div class="content-block">
                                <h5>Title</h5>
                                <p>locale accept from http</p>
                                <a href="">click here </a>
                            </div> -->
                        </div>
                    </div>
                    <!-- end col  -->

                    <div class="col-md-6">
                        <div class="image-content-block text-center">
                            <h2>SHORT INFO</h2>
                            <div class="image-block">
                            <img src="{{asset('front-assets/img/dbb2.png')}}" alt="">
                            </div>
                            <!-- <div class="content-block">
                                <h5>Title</h5>
                                <p>locale accept from http</p>
                                <a href="">click here </a>
                            </div> -->
                        </div>
                    </div>
                    <!-- end col  -->
                </div>
               <!-- end row  -->
            </div>
        </div>
    </div>
</div>
@endif
@endif
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="{{asset('front-assets/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('front-assets/js/jquery-migrate-3.0.0.min.js')}}"></script>
<script src="{{asset('front-assets/js/tether.min.js')}}"></script>
<script src="{{asset('front-assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front-assets/js/slick.min.js')}}"></script>
<script src="{{asset('front-assets/js/jquery.matchHeight-min.js')}}"></script>
<script src="{{asset('front-assets/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('front-assets/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('front-assets/js/flickity.pkgd.min.js')}}"></script>
<script src="{{asset('front-assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('front-assets/js/jquery.debouncedresize.js')}}"></script>
<script src="{{asset('front-assets/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('front-assets/js/typed.min.js')}}"></script>
<script src="{{asset('front-assets/js/particles.min.js')}}"></script>
<script src="{{asset('front-assets/js/config.js')}}"></script>
<script src="{{asset('front-assets/js/custom.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMYUCUdT1WkZJFkrpI4IzEObG8_YNcZPg&callback=myMap"></script>
@yield('page_specific_js')

</body>
</html>