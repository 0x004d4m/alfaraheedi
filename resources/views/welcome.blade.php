@extends('website.layout.main')
@section('title', 'Home')
@section('content')

@include('website.partials.slider')

@include('website.partials.about')

@include('website.partials.best_selling')

@include('website.partials.latest')

@include('website.partials.contact')

@endsection
