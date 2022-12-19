@if (App\Models\Partner::count() > 0)

    <!-- Best Selling start -->
    <div id='partners' class="best-selling">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>{{__('content.Partners')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="selling-active">
                        @foreach (App\Models\Partner::get() as $Partner)
                            <!-- Single -->
                            <div class="properties pb-20">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <img src="{{ $Partner->image }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Best Selling End -->
@endif
