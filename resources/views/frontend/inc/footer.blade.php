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
                        <a href="https://www.facebook.com/drdevibasnet" target="_blank"><i class="fa fa-facebook"></i></a>
                        <!-- <a href="#"><i class="fa fa-google"></i></a> -->
                        <a href="https://twitter.com/basnetdevi" target="_blank"><i class="fa fa-twitter"></i></a>
                        <!-- <a href="#"><i class="fa fa-tumblr"></i></a> -->
                        <a href="https://www.instagram.com/drdevibasnet/" target="_blank"><i class="fa fa-instagram"></i></a>
                        <!-- <a href="#"><i class="fa fa-youtube"></i></a> -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->

</div>

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