@extends('website.layout.main')
@section('title', __('content.signin'))
@section('content')

<!-- login Area Start -->
<div class="login-form-area" dir="{{__('content.dir')}}">
    <form class="login-form" method="POST" action="">
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
        <div class="single-input-fields">
            <label style="text-align: {{__('content.dir2')}};">{{__('content.Password')}}</label>
            <input required type="password" name="password" placeholder="{{__('content.Password')}}">
            @isset($Error)
                @isset($Error->password)
                    <small class="text-danger">{{ $Error->password[0] }}</small>
                @endisset
            @endisset
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
