<!-- HIRE ME -->
@if(isset($hireme))
<section id="hireme" @if(isset($hireme))
    style="background: url('{{asset('storage/uploads/pages/large' . '/' . $hireme->featured_image)}}'); background-size:cover;background-color:#ffffff"
    @endif data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
    <div class="container section-header">
        <div class="col-12">
            <h2 class="animation" data-animation="fadeInLeft">{{$hireme->excerpt}}</h2>
            <h4 class="animation" data-animation="fadeInLeft">{!! $hireme->content !!}</h4>
            @php
            $link = $hireme->pageDetails->where('meta_key','Link')->first()->meta_value;
            @endphp
            <a data-animation="fadeInRight" class="btn btn-primary animation" href="{{strip_tags($link)}}"
                target="_blank">View
                my
                manifesto!</a>
        </div>
    </div>
</section>
@endif
<!-- HIRE ME END -->