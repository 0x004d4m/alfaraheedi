<!-- Register Area Start -->
<div class="register-form-area" dir="{{__('content.dir')}}">
    <form class="register-form text-center" method="POST" action="/register" enctype="multipart/form-data">
        @csrf
        <!-- Login Heading -->
        <div class="register-heading">
            <span>{{__('content.SignUp')}}</span>
            <p>{{__('content.SignUp2')}}</p>
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
                <label style="text-align: {{__('content.dir2')}};">{{__('content.Firstname')}}</label>
                <input required type="text" name="first_name" placeholder="{{__('content.Firstname')}}" value="@isset($Request){{$Request['first_name']}}@endisset">
                @isset($Error)
                    @isset($Error->first_name)
                        <small class="text-danger">{{ $Error->first_name[0] }}</small>
                    @endisset
                @endisset
            </div>
            <div class="single-input-fields">
                <label style="text-align: {{__('content.dir2')}};">{{__('content.Lastname')}}</label>
                <input required type="text" name="last_name" placeholder="{{__('content.Lastname')}}" value="@isset($Request){{$Request['last_name']}}@endisset">
                @isset($Error)
                    @isset($Error->last_name)
                        <small class="text-danger">{{ $Error->last_name[0] }}</small>
                    @endisset
                @endisset
            </div>
            <div class="single-input-fields">
                <label style="text-align: {{__('content.dir2')}};">{{__('content.EmailAddress')}}</label>
                <input required type="email" name="email" placeholder="{{__('content.EmailAddress')}}" value="@isset($Request){{$Request['email']}}@endisset">
                @isset($Error)
                    @isset($Error->email)
                        <small class="text-danger">{{ $Error->email[0] }}</small>
                    @endisset
                @endisset
            </div>
            <div class="single-input-fields">
                <label style="text-align: {{__('content.dir2')}};">{{__('content.PhoneNumber')}}</label>
                <input required type="number" name="phone" placeholder="{{__('content.PhoneNumber2')}}" value="@isset($Request){{$Request['phone']}}@endisset">
                @isset($Error)
                    @isset($Error->phone)
                        <small class="text-danger">{{ $Error->phone[0] }}</small>
                    @endisset
                @endisset
            </div>
            <div class="single-input-fields">
                <label style="text-align: {{__('content.dir2')}};">{{__('content.Address')}}</label>
                <input required type="text" name="address" placeholder="{{__('content.Address')}}" value="@isset($Request){{$Request['address']}}@endisset">
                @isset($Error)
                    @isset($Error->address)
                        <small class="text-danger">{{ $Error->address[0] }}</small>
                    @endisset
                @endisset
            </div>
            <div class="single-input-fields">
                <label style="text-align: {{__('content.dir2')}};">{{__('content.Image')}}</label>
                <input type="file" class="form-control" name="image" placeholder="{{__('content.Image')}}">
                @isset($Error)
                    @isset($Error->image)
                        <small class="text-danger">{{ $Error->image[0] }}</small>
                    @endisset
                @endisset
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
            <div class="single-input-fields">
                <label style="text-align: {{__('content.dir2')}};">{{__('content.ConfirmPassword')}}</label>
                <input required type="password" name="password_confirmation" placeholder="{{__('content.ConfirmPassword')}}">
                @isset($Error)
                    @isset($Error->password_confirmation)
                        <small class="text-danger">{{ $Error->password_confirmation[0] }}</small>
                    @endisset
                @endisset
            </div>
        </div>
        <!-- form Footer -->
        <div class="register-footer">
            <p> {{__('content.Alreadyhaveanaccount')}} <a href="/login"> {{__('content.Login')}}</a> {{__('content.Here')}}</p>
            <button type="submit" name="register" class="submit-btn3">{{__('content.SignUp')}}</button>
        </div>
    </form>
</div>
<!-- Register Area End -->
