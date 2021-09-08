<!-- BLOG / NEWS -->
@if($blogs->count() > 0)
<section id="blog">
        <div class="section-header">
            <div>
                <h2>Watch my Opinions</h2>
            </div>
        </div>
        <div class="container">
            <div class="xrow my-opinion slider">
                @foreach($blogs as $blog)
                <div class="xcol-12 xcol-lg-4 item">
                    <div class="slide-item">
                        <div class="slide-image">
                            <img src="{{asset('uploads/blogs/large/'.$blog->featured_image)}}" class="img-fluid" alt="{{$blog->slug}}"/>
                        </div>
                        <div class="slide-content">
                            <h4>{{$blog->title}}</h4>
                            {!!$blog->content!!}
                            <a href="{{$blog->external_link}}" class="btn btn-secondary" target="_blank">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- BLOG / NEWS END -->
@endif