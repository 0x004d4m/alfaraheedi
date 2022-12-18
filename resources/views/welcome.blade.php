@extends('website.layout.main')
@section('title', __('content.Home'))
@section('content')

@include('website.partials.slider')

@include('website.partials.about')

@include('website.partials.best_selling')

@include('website.partials.latest')

@include('website.partials.partners')

@include('website.partials.contact')

@endsection
