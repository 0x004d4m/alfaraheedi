<!-- login Area Start -->
<div class="login-form-area" dir="{{__('content.dir')}}">
    <form class="login-form" method="POST" action="/login">
        @csrf
        <!-- Login Heading -->
        <div class="login-heading">
            <span>{{__('content.Login')}}</span>
            <p>{{__('content.Login2')}}</p>
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
            <div class="single-input-fields text-end">
                <label style="text-align: {{__('content.dir2')}};">{{__('content.Phone or Email Address')}}</label>
                <input type="text" name="username" required placeholder="{{__('content.Phone or Email Address')}}">
                @isset($Error)
                    @isset($Error->errors->username)
                        <small class="text-danger">{{ $Error->errors->username[0] }}</small>
                    @endisset
                @endisset
            </div>
            <div class="single-input-fields text-end">
                <label style="text-align: {{__('content.dir2')}};">{{__('content.Password')}}</label>
                <input type="password" name="password" required placeholder="{{__('content.Password')}}">
            </div>
            <div class="single-input-fields login-check">
                <a href="/forget" class="f-right">{{__('content.Forgot Password')}}</a>
            </div>
        </div>
        <!-- form Footer -->
        <div class="login-footer">
            <p>{{__('content.Dont have an account')}} <a href="/register">{{__('content.Sign Up')}}</a> {{__('content.Here')}}</p>
            <button type="submit" name="login" class="submit-btn3">{{__('content.Login')}}</button>
        </div>
    </form>
</div>
<!-- login Area End -->
