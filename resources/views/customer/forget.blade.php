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
            @if (Session::has('OK'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('OK') }}
                </div>
                @php
                    Session::forget("OK");
                @endphp
            @endif
        </div>
        <!-- Single Input Fields -->
        <div class="input-box">
            <div class="single-input-fields text-end">
                <label style="text-align: {{__('content.dir2')}};">{{__('content.PhoneorEmailAddress')}}</label>
                <input type="text" name="username" required placeholder="{{__('content.PhoneorEmailAddress')}}">
                @isset($Error)
                    @isset($Error->errors->username)
                        <small class="text-danger">{{ $Error->errors->username[0] }}</small>
                    @endisset
                @endisset
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
