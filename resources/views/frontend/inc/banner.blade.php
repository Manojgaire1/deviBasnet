<!-- HERO AREA -->
<div class="jumbotron" @if(isset($banner))
    style="background: url('{{asset('storage/uploads/banners/large' . '/' . $banner->featured_image)}}'); background-size:cover;background-color:#ffffff"
    @endif id="hero" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
    <div class="container">
        @if(isset($banner))
        <h1>{{$banner->title}}</h1>
        @endif
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