@extends('website.layout.main')
@section('styles')
    <style>
        .header-bottom .main-menu ul li a{
            padding: 15px 35px !important;
        }
    </style>
@endsection
@section('title', __('content.Home'))
@section('content')

    @include('website.partials.slider')

    @include('website.partials.about')

    @include('website.partials.best_selling')

    @include('website.partials.latest')

    @include('website.partials.partners')

    @include('website.partials.contact')

@endsection
