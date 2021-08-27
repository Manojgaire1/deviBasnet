@extends('frontend.layouts.master')
@section('content')
<!-- HERO AREA -->
<div class="jumbotron" id="hero" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
        <div class="container">
            <h1>Hello, I am Devi B. Basnet</h1>
            <span class="typed">I am social worker</span>

            <div class="typed-wrap"></div>
            <a href="#portfolio" class="btn btn-primary portfolio-link scroll-link">See my activities</a>
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
                        <img src="{{asset('front-assets/img/photo.png')}}" class="photo" alt=""/>

                        <div class="photo-overlay">
                            <div class="photo-text social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <!-- <a href="#"><i class="fa fa-google"></i></a> -->
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <!-- <a href="#"><i class="fa fa-tumblr"></i></a> -->
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <!-- <a href="#"><i class="fa fa-youtube"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div id="aboutRight" class="col-lg-6 col-12">
                    <div>
                        <h4>Hello! I am Devi B. Basnet</h4>

                        <h2>ABOUT ME</h2>
                    </div>
                    <div>
                        <p>
                        Highly self-motivated Ph.D. graduate with demonstrated research expertise in genetic, 
                        antibody engineering and isolation of monoclonal antibody, with strong interpersonal skills 
                        developed from extensive social exposure. Special expertise in the following areas:</p>
                        <ul>
                            <li>Antibody Engineering</li>
                            <li>Streptomyces Genetics</li>
                            <li>Molecular Biology</li>
                            <li>Stable Cell line Development</li>
                            <li>Bioinformatics</li>
                            <li>Biosynthesis</li>
                        </ul>
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
                <h2>My interests</h2>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box">
                            <div class="circle"><i class="fa fa-handshake-o"></i></div>
                            <h3>Social work</h3>

                            <p>Praesent magna neque, dapibus sit amet eros sed, aliquam interdum felis. Nulla rhoncus
                                ipsum dui.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box">
                            <div class="circle"><i class="fa fa-cogs"></i></div>
                            <h3>Yoga Medititation</h3>

                            <p>Praesent magna neque, dapibus sit amet eros sed, aliquam interdum felis. Nulla rhoncus
                                ipsum dui.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="box">
                            <div class="circle"><i class="fa fa-code"></i></div>
                            <h3>Motivator</h3>

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
                    <h3>SLC(School Leaving Certificate)</h3>
                    <span>1980 - 1990</span>
                    <p>Sautha Secondary School</p>
                </div>
            </div>
            <div class="timeline-block timeline-block-left">
                <div class="marker"></div>
                <div class="timeline-content">
                    <h3>I.SC. & B.SC.</h3>
                    <span>1991 - 1997</span>
                    <p>Mahendra Morang Campus</p>
                </div>
            </div>
            <div class="timeline-block timeline-block-right">
                <div class="marker"></div>
                <div class="timeline-content">
                    <h3>M.SC.</h3>
                    <span>1998 - 2000</span>
                    <p>Tribhuwan University</p>
                </div>
            </div>
            <div class="timeline-block timeline-block-left">
                <div class="marker"></div>
                <div class="timeline-content">
                    <h3>PHD</h3>
                    <span>2001-2005</span>
                    <p>Sun moon University</p>
                </div>
            </div>
            <div class="timeline-block timeline-block-right">
                <div class="marker"></div>
                <div class="timeline-content">
                    <h3>Post Doctrate</h3>
                    <span>2006 - 2008</span>
                    <p>Ewha Woman’s University</p>
                </div>
            </div>
            <div class="timeline-block timeline-block-left">
                <div class="marker"></div>
                <div class="timeline-content">
                    <h3>Senior Research Scientist | Medytox, Inc.</h3>
                    <span>2008 - Present</span>
                    <p> Director - The Center for natural and applied sciences(CENAS)</p> 
                    <p> Member - Research Institute for Bioscience and Biotechnology (RIBB)</p>
                    <p> Member - Anti Snakevenom Serum Research and Development Pvt. Ltd.</p>
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
    <section id="portfolio">
        <div class="section-header">
            <div>
                <h2>My Activities</h2>
            </div>
        </div>
        <div class="container">
            <div id="filters-group">
                <a class="filter" data-filter="*">show all</a>
                <a class="filter" data-filter=".social">Social</a>
                <a class="filter" data-filter=".research">Research and Development</a>
                <a class="filter" data-filter=".entrepreneur">Entrepreneur</a>
            </div>
            <div id="portfolio-items" class="row">
                <div class="item col-md-6 col-lg-4 plugins social" data-category="social">
                    <a title="Participate in Nepal embassy national day in Seoul held on 2012-02-12. It was organized in Nepal embassy buiding on the presence of Nepal ambassador Mr. Rakesh Rana."
                       data-rel="prettyPhoto"
                       href="{{asset('front-assets/img/activities/Nepal-Embassy-national-day-in-Seoul.png')}}">
                        <div class="item-wrap">
                            <img class="img-fluid" src="{{asset('front-assets/img/activities/Nepal-Embassy-national-day-in-Seoul.png')}}" alt="Nepal embassy national day in Seoul">
                        </div>
                        <span class="magnifier"></span>
                    </a>
                </div>
                <div class="item col-md-6 col-lg-4 plugins social" data-category="social">
                    <a title="Me with Dr. Baburam Bhattarai"
                       data-rel="prettyPhoto"
                       href="{{asset('front-assets/img/activities/Devi_with_Dr_Baburam.png')}}">
                        <div class="item-wrap">
                            <img class="img-fluid" src="{{asset('front-assets/img/activities/Devi_with_Dr_Baburam.png')}}" alt="Me with Dr. Baburam Bhattarai">
                        </div>
                        <span class="magnifier"></span>
                    </a>
                </div>
                <div class="item col-md-6 col-lg-4 plugins social" data-category="social">
                    <a title="Custom description."
                       data-rel="prettyPhoto"
                       href="{{asset('front-assets/img/activities/2016_gajedo_1.png')}}">
                        <div class="item-wrap">
                            <img class="img-fluid" src="{{asset('front-assets/img/activities/2016_gajedo_1.png')}}" alt="Photography">
                        </div>
                        <span class="magnifier"></span>
                    </a>
                </div>
                <div class="item col-md-6 col-lg-4 col-12 social" data-category="social">
                    <a title="Participated in inaguration ceremony of Nepal house help on 2012."
                       data-rel="prettyPhoto"
                       href="{{asset('front-assets/img/activities/2012_Program_2.png')}}">
                        <div class="item-wrap">
                            <img class="img-fluid" src="{{asset('front-assets/img/activities/2012_Program_2.png')}}" alt="Inaguration ceremony of Nepal house in 2012.">
                        </div>
                        <span class="magnifier"></span>
                    </a>
                </div>
                <div class="item col-md-6 col-lg-4 col-12 social" data-category="social">
                    <a title="Interaction with Society of Nepalese students in Korea."
                       data-rel="prettyPhoto"
                       href="{{asset('front-assets/img/activities/2014_interaction_1.png')}}">
                        <div class="item-wrap">
                            <img class="img-fluid" src="{{asset('front-assets/img/activities/2014_interaction_1.png')}}" alt="Interaction with Society of Nepalese students in Korea.">
                        </div>
                        <span class="magnifier"></span>
                    </a>
                </div>
                <div class="item col-md-6 col-lg-4 col-12 social" data-category="social">
                    <a title="Interactionwith Mahabir Pun on 2014 at Seoul."
                       data-rel="prettyPhoto"
                       href="{{asset('front-assets/img/activities/2014_Mahabir_interaction-2.png')}}">
                        <div class="item-wrap">
                            <img class="img-fluid" src="{{asset('front-assets/img/activities/2014_Mahabir_interaction-2.png')}}" alt="Interaction with Mahabir Pun">
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
                <h2>Watch my Opinions</h2>
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
                <!-- <p>Please fill the form below. I will contact you as soon as possible.</p> -->
            </div>
        </div>
        <div class="container">
            <!-- <div id="form-messages"></div>
            <div class="form-wrap"> -->
            <div class="col-12 col-md-12">
                    <div>
                        <i class="fa fa-map-marker"> </i>Suwon, South Korea 
                    </div>
                    <div>
                        <i class="fa fa-phone"> </i>+82 10-2343-4725
                    </div>
                    <div>
                        <i class="fa fa-envelope"> </i>contact@devibasnet.com
                    </div>
            </div>
                <!-- <form id="contact-form" action="api/contact.php" method="post" autocomplete="off">
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
                </form> -->
                <!-- <div id="ajaxLoad"></div> -->
            <!-- </div> -->
        </div>
    </section>
    <!-- CONTACT FORM  END -->
@endsection