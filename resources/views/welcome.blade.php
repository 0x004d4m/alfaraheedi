@extends('website.layout.main')
@section('title', 'Home')
@section('content')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: about</h1>
@include('website.partials.about')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: best_selling</h1>
@include('website.partials.best_selling')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: blog_details</h1>
@include('website.partials.blog_details')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: blog</h1>
@include('website.partials.blog')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: books_review</h1>
@include('website.partials.books_review')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: cart</h1>
@include('website.partials.cart')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: checkout</h1>
@include('website.partials.checkout')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: contact</h1>
@include('website.partials.contact')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: latest</h1>
@include('website.partials.latest')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: listing</h1>
@include('website.partials.listing')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: login</h1>
@include('website.partials.login')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: register</h1>
@include('website.partials.register')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: services</h1>
@include('website.partials.services')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: services2</h1>
@include('website.partials.services2')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: slider</h1>
@include('website.partials.slider')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: subscribe</h1>
@include('website.partials.subscribe')
<hr style="width: 100%; height:100px; color:black;">
<h1>ADAM: want_to_work</h1>
@include('website.partials.want_to_work')
@endsection
