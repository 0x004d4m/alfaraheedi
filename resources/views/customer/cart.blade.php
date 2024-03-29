@extends('website.layout.main')
@section('title', __('content.Cart'))
@section('styles')
<style>
    .cart_inner .table tbody tr td{
        padding-top: 15px;
        padding-bottom: 15px;
    }
    .cart_inner .table tbody tr td .media .d-flex img{
        max-width: 100px;
    }
</style>
@endsection
@section('content')

@include('website.partials.cart')

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });
</script>
@endsection
