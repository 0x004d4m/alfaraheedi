@extends('website.layout.main')
@section('title', __('content.Orders'))
@section('content')
<section class="cart_area section-padding" dir="{{__('content.dir')}}">
    <div class="container">
        <div class="cart_inner">
            <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{json_decode($Order->prepare_checkout_result)->id}}"></script>
            <form action="{{url('/order/'.$Order->id.'/pay2')}}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>
        </div>
    </div>
</section>

@endsection
