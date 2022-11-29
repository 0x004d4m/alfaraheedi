<!-- About details Start -->
<div id='about' class="about-details">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-8">
                <div class="section-tittle mb-15">
                    <h2>{{__('content.About')}}</h2>
                </div>
            </div>
            <div class="col-xl-9" dir="{{Session::get('locale') == 'ar'?'rtl':'ltr'}}">
                <div class="about-pera">
                    <p>{!!__('content.about_content')!!}</p>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- About details End -->
