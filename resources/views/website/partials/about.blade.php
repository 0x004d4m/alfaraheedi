<!-- About details Start -->
<div id='about' class="about-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-center">
                <div class="section-tittle mb-15">
                    <h2>{{__('content.About')}}</h2>
                </div>
            </div>
        </div>
        <div class="row {{Session::get('locale') == 'ar'?'text-right':'text-left'}}" dir="{{Session::get('locale') == 'ar'?'rtl':'ltr'}}">
            <div class="col-xl-6">
                <img class="img-fluid" src="{{url('template/assets/img/about.png')}}">
            </div>
            <div class="col-xl-6">
                <div class="">
                    <p>{!!__('content.about_content')!!}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img class="img-fluid" src="{{url('template/assets/img/video.jpg')}}">
                </a>
            </div>
        </div>
    </div>
</div>
<!-- About details End -->
