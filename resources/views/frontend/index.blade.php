@extends('frontend.layouts.master')
@section('content')
    @include('frontend.inc.banner')
    @include('frontend.inc.about',[
        'social_facebook_link'   => $social_facebook_link,
        'social_twitter_link'    => $social_twitter_link,
        'social_instagram_link'  => $social_instagram_link,
        'social_gate_link'       => $social_gate_link,
        'social_linkedin_link'   => $social_linkedin_link
    ])
    @include('frontend.inc.services')
    @include('frontend.inc.experience',['timelines' => $timelines])
    @include('frontend.inc.hireMe')
    @include('frontend.inc.activity',['types' => $types,'activities' => $activities])
    @include('frontend.inc.testimonials')
    @include('frontend.inc.blog',['blogs' => $blogs])
    @include('frontend.inc.contact',[
        'admin_contact_email'    => $admin_contact_email,
        'admin_contact_phone'    => $admin_contact_phone,
        'admin_address'          => $admin_address,
    ])
@endsection