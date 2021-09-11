@extends('frontend.layouts.master')
@section('content')
    @include('frontend.inc.banner')
    @include('frontend.inc.about')
    @include('frontend.inc.services')
    @include('frontend.inc.experience',['timelines' => $timelines])
    @include('frontend.inc.hireMe')
    @include('frontend.inc.activity',['types' => $types,'activities' => $activities])
    @include('frontend.inc.testimonials',[
        'testimonials' => $testimonials
    ])
    @include('frontend.inc.blog',['blogs' => $blogs])
    @include('frontend.inc.contact',[
        'admin_contact_email'    => $admin_contact_email,
        'admin_contact_phone'    => $admin_contact_phone,
        'admin_address'          => $admin_address,
    ])
@endsection