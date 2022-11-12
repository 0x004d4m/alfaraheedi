@extends('website.layout.main')
@section('title', 'Home')
@section('content')
    @include('website.partials.about')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.best_selling')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.blog_details')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.blog')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.books_review')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.cart')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.checkout')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.contact')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.latest')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.listing')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.login')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.register')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.services')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.services2')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.slider')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.subscribe')
    <hr style="width: 100%; height:100px; color:black;">
    @include('website.partials.want_to_work')
@endsection
