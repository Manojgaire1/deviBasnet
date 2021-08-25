@extends('frontend.layouts.master')
@section('content')
<!-- HERO AREA -->
<div class="jumbotron" id="hero" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
        <div class="container">
            <h1>Hello, I am Dr. Devi Bahadur Basnet</h1>
            <span class="typed">I am web developer</span>

            <div class="typed-wrap"></div>
            <a href="#portfolio" class="btn btn-primary portfolio-link scroll-link">See my portfolio</a>
        </div>
    </div>
    <!-- HERO AREA END -->

    <!-- bouncing arrow -->
    <div class="arrow-wrap">
        <a href="#about" class="arrow down-bounce scroll-link fa fa-angle-double-down"></a>
    </div>

    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="photo-wrap">
                        <img src="{{asset('front-assets/img/photo.jpg')}}" class="photo" alt=""/>

                        <div class="photo-overlay">
                            <div class="photo-text social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tumblr"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="aboutRight" class="col-lg-6 col-12">
                    <div>
                        <h4>Hello! I am Dr. Devi Bahadur Basnet</h4>

                        <h2>ABOUT ME</h2>
                    </div>
                    <div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ultrices, nulla et
                            egestas venenatis, urna ante tincidunt erat, vitae lacinia ante urna dignissim purus. Class
                            aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam
                            diam purus, facilisis eu placerat vel, egestas vel massa. Phasellus pharetra urna at sem
                            convallis bibendum. Fusce sed leo quis purus luctus tempus. Ut ornare mattis justo.
                        </p>

                        <p>
                            Pellentesque lectus libero, lobortis sed quam in, congue elementum tellus. Vestibulum dui
                            enim, aliquet in tellus id, luctus tristique velit. Mauris augue sapien, condimentum sed
                            ligula sit amet, facilisis aliquet nulla. Donec sed congue tellus, quis efficitur nisl.
                            Maecenas at sapien orci. Donec dapibus pellentesque orci, nec egestas sapien ultricies eu.
                            Morbi eu sem commodo, pellentesque massa quis.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ABOUT END -->

    <!-- SERVICES -->
    <section id="services">
        <div class="section-header">
            <div>
                <h2>Services I offer</h2>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box">
                            <div class="circle"><i class="fa fa-desktop"></i></div>
                            <h3>Web Design</h3>

                            <p>Praesent magna neque, dapibus sit amet eros sed, aliquam interdum felis. Nulla rhoncus
                                ipsum dui.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box">
                            <div class="circle"><i class="fa fa-cogs"></i></div>
                            <h3>Coding</h3>

                            <p>Praesent magna neque, dapibus sit amet eros sed, aliquam interdum felis. Nulla rhoncus
                                ipsum dui.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box">
                            <div class="circle"><i class="fa fa-code"></i></div>
                            <h3>Clean Code</h3>

                            <p>Praesent magna neque, dapibus sit amet eros sed, aliquam interdum felis. Nulla rhoncus
                                ipsum dui.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box">
                            <div class="circle"><i class="fa fa-camera"></i></div>
                            <h3>Photography</h3>

                            <p>Praesent magna neque, dapibus sit amet eros sed, aliquam interdum felis. Nulla rhoncus
                                ipsum dui.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SERVICES END -->

    <!-- EXPERIENCE -->
    <section id="experience">
        <div class="section-header">
            <div>
                <h2>My Career timeline</h2>
            </div>
        </div>
        <div class="container">
            <div class="timeline-block timeline-block-right">
                <div class="marker"></div>
                <div class="timeline-content">
                    <h3>Web Designer</h3>
                    <span>2015 - 2018</span>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate.</p>
                </div>
            </div>
            <div class="timeline-block timeline-block-left">
                <div class="marker"></div>
                <div class="timeline-content">
                    <h3>Web Developer</h3>
                    <span>2010 - 2015</span>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate.</p>
                </div>
            </div>
            <div class="timeline-block timeline-block-right">
                <div class="marker"></div>
                <div class="timeline-content">
                    <h3>Programmer</h3>
                    <span>2002 - 2010</span>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate.</p>
                </div>
            </div>
            <div class="timeline-block timeline-block-left">
                <div class="marker"></div>
                <div class="timeline-content">
                    <h3>Graphics Designer</h3>
                    <span>2000 - 2002</span>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- EXPERIENCE END -->

    <!-- HIRE ME -->
    <section id="hireme" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
        <div class="section-header container">
            <div class="col-12">
                <h2 class="animation" data-animation="fadeInLeft">Do you have an interesting project?</h2>
                <h4 class="animation" data-animation="fadeInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit. Proin suscipit lorem in ipsum efficitur laoreet. Suspendisse malesuada mi ligula, sit amet
                    tristique ex lacinia vel.</h4>
                <a data-animation="fadeInRight" class="btn btn-primary scroll-link animation" href="#contact">Hire
                    me!</a>
            </div>
        </div>
    </section>
    <!-- HIRE ME END -->

    <!-- PORTFOLIO -->
    <section id="activity">
        <div class="section-header">
            <div>
                <h2>My Activities</h2>
            </div>
        </div>
        <div class="container">
            <div id="filters-group">
                <a class="filter" data-filter="*">show all</a>
                <a class="filter" data-filter=".plugins">plugins</a>
                <a class="filter" data-filter=".design">design</a>
                <a class="filter" data-filter=".photography">photography</a>
            </div>
            <div id="portfolio-items" class="row">
                <div class="item col-md-6 col-lg-4 photography" data-category="photography">
                    <a title="Custom description."
                       data-rel="prettyPhoto"
                       href="{{asset('front-assets/img/portfolio/portfolio1.jpg')}}">
                        <div class="item-wrap">
                            <img class="img-fluid" src="{{asset('front-assets/img/portfolio/portfolio1.jpg')}}" alt="Photography">
                        </div>
                        <span class="magnifier"></span>
                    </a>
                </div>
                <div class="item col-md-6 col-lg-4 plugins design" data-category="plugins, design">
                    <a title="Custom description."
                       data-rel="prettyPhoto"
                       href="{{asset('front-assets/img/portfolio/portfolio2.jpg')}}">
                        <div class="item-wrap">
                            <img class="img-fluid" src="{{asset('front-assets/img/portfolio/portfolio2.jpg')}}" alt="WordPress Plugin">
                        </div>
                        <span class="magnifier"></span>
                    </a>
                </div>
                <div class="item col-md-6 col-lg-4 plugins photography" data-category="plugins, photography">
                    <a title="Custom description."
                       data-rel="prettyPhoto"
                       href="{{asset('front-assets/img/portfolio/portfolio3.jpg')}}">
                        <div class="item-wrap">
                            <img class="img-fluid" src="{{asset('front-assets/img/portfolio/portfolio3.jpg')}}" alt="Photography">
                        </div>
                        <span class="magnifier"></span>
                    </a>
                </div>
                <div class="item col-md-6 col-lg-4 col-12 plugins" data-category="plugins">
                    <a title="Custom description."
                       data-rel="prettyPhoto"
                       href="{{asset('front-assets/img/portfolio/portfolio4.jpg')}}">
                        <div class="item-wrap">
                            <img class="img-fluid" src="{{asset('front-assets/img/portfolio/portfolio4.jpg')}}" alt="jQuery Plugin">
                        </div>
                        <span class="magnifier"></span>
                    </a>
                </div>
                <div class="item col-md-6 col-lg-4 col-12 design" data-category="design">
                    <a title="Custom description."
                       data-rel="prettyPhoto"
                       href="{{asset('front-assets/img/portfolio/portfolio5.jpg')}}">
                        <div class="item-wrap">
                            <img class="img-fluid" src="{{asset('front-assets/img/portfolio/portfolio5.jpg')}}" alt="Design">
                        </div>
                        <span class="magnifier"></span>
                    </a>
                </div>
                <div class="item col-md-6 col-lg-4 col-12 plugins design" data-category="plugins, design">
                    <a title="Custom description."
                       data-rel="prettyPhoto"
                       href="{{asset('front-assets/img/portfolio/portfolio6.jpg')}}">
                        <div class="item-wrap">
                            <img class="img-fluid" src="{{asset('front-assets/img/portfolio/portfolio6.jpg')}}" alt="Design">
                        </div>
                        <span class="magnifier"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- PORTFOLIO END -->

    <!-- TESTIMONIALS -->
    <section id="testimonials" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="100">
        <div class="section-header">
            <div>
                <h2>What my clients say</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="testimonials-content" class="col-12">
                    <div class="gallery-cell">
                        <div class="testimonial">
                            <img class="testimonial-avatar"
                                 src="{{asset('front-assets/img/client1.jpg')}}" alt="">
                            <q class="testimonial-quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
                                mauris
                                ex, gravida ut leo eu, rhoncus porta orci. Fusce vitae rutrum nulla.</q>
                            <span class="testimonial-author">Joe Smith, CEO</span>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <div class="testimonial">
                            <img class="testimonial-avatar"
                                 src="{{asset('front-assets/img/client2.jpg')}}" alt="">
                            <q class="testimonial-quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
                                mauris
                                ex, gravida ut leo eu, rhoncus porta orci. Fusce vitae rutrum nulla.</q>
                            <span class="testimonial-author">Lisa Jones, Designer</span>
                        </div>
                    </div>
                    <div class="gallery-cell">
                        <div class="testimonial">
                            <img class="testimonial-avatar"
                                 src="{{asset('front-assets/img/client3.jpg')}}" alt="">
                            <q class="testimonial-quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
                                mauris
                                ex, gravida ut leo eu, rhoncus porta orci. Fusce vitae rutrum nulla.</q>
                            <span class="testimonial-author">Ryan Waltz, Developer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TESTIMONIALS END -->

    <!-- BLOG / NEWS -->
    <section id="blog">
        <div class="section-header">
            <div>
                <h2>Watch my Blog</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 item">
                    <img src="{{asset('front-assets/img/blog/blog1.jpg')}}" class="img-fluid" alt=""/>
                    <h4>Donec hendrerit ultricies orci eget pretium</h4>

                    <p>
                        Vivamus a mattis augue. Suspendisse aliquam justo in nibh hendrerit lobortis. Proin euismod nisl
                        sem, ac rhoncus ex lacinia nec.
                        Aliquam bibendum vel dui eu tincidunt...
                    </p>
                    <a href="#" class="btn btn-secondary">Read more...</a>
                </div>
                <div class="col-12 col-lg-4 item">
                    <img src="{{asset('front-assets/img/blog/blog2.jpg')}}" class="img-fluid" alt=""/>
                    <h4>Donec hendrerit ultricies orci eget pretium</h4>

                    <p>
                        Vivamus a mattis augue. Suspendisse aliquam justo in nibh hendrerit lobortis. Proin euismod nisl
                        sem, ac rhoncus ex lacinia nec.
                        Aliquam bibendum vel dui eu tincidunt...
                    </p>
                    <a href="#" class="btn btn-secondary">Read more...</a>
                </div>
                <div class="col-12 col-lg-4 item">
                    <img src="{{asset('front-assets/img/blog/blog3.jpg')}}" class="img-fluid" alt=""/>
                    <h4>Donec hendrerit ultricies orci eget pretium</h4>

                    <p>
                        Vivamus a mattis augue. Suspendisse aliquam justo in nibh hendrerit lobortis. Proin euismod nisl
                        sem, ac rhoncus ex lacinia nec.
                        Aliquam bibendum vel dui eu tincidunt...
                    </p>
                    <a href="#" class="btn btn-secondary">Read more...</a>
                </div>
            </div>
        </div>
    </section>
    <!-- BLOG / NEWS END -->

    <!-- CONTACT FORM  -->
    <section id="contact">
        <div class="section-header">
            <div>
                <h2>Contact Me</h2>

                <p>Please fill the form below. I will contact you as soon as possible.</p>
            </div>
        </div>
        <div class="container">
            <div id="form-messages"></div>
            <div class="form-wrap">
                <form id="contact-form" action="api/contact.php" method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <input class="form-control" type="text" placeholder="Your Name" name="name" id="name"
                                   required/>
                            <input class="form-control" type="text" placeholder="E-mail" name="email" id="email"
                                   required/>
                            <input class="form-control" type="text" placeholder="Subject" name="subject" id="subject"
                                   required/>
                        </div>
                        <div class="col-12 col-sm-6">
                            <textarea class="form-control" placeholder="Your Message" rows="7" name="message"
                                      id="message" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">SEND MESSAGE</button>
                        </div>
                    </div>
                </form>
                <div id="ajaxLoad"></div>
            </div>
        </div>
    </section>
    <!-- CONTACT FORM  END -->
@endsection