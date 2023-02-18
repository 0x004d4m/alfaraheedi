@extends('website.layout.main')
@section('title', __('content.signin'))
@section('content')
<!-- login Area Start -->
<div class="login-form-area" dir="{{__('content.dir')}}">
    <form class="login-form" method="POST" action="/login">
        @csrf
        <!-- Login Heading -->
        <div class="login-heading">
            <span>{{__('content.ForgotPassword')}}</span>
            @if (Session::has('Error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('Error') }}
                </div>
                @php
                    Session::forget("Error");
                @endphp
            @endif
        </div>
        <!-- Single Input Fields -->
        <div class="input-box">
            <div class="single-input-fields">
                <label style="text-align: {{__('content.dir2')}};">{{__('content.Password')}}</label>
                <input type="password" name="password" required placeholder="{{__('content.Password')}}">
            </div>
        </div>
        <!-- form Footer -->
        <div class="login-footer">
            <p> {{__('content.Alreadyhaveanaccount')}} <a href="/login"> {{__('content.Login')}}</a> {{__('content.Here')}}</p>
            <button type="submit" name="login" class="submit-btn3">{{__('content.Send')}}</button>
        </div>
    </form>
</div>
<!-- login Area End -->


@endsection
