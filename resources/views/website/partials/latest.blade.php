<!-- Latest-items Start -->
<section class="our-client section-padding best-selling">
    <div id='latest' class="container">
        <div class="row justify-content-between" dir="{{Session::get('locale') == 'ar'?'rtl':'ltr'}}">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <!-- Section Tittle -->
                <div class="section-tittle  mb-40">
                    <h2>{{__('content.LatestPublisheditems')}}</h2>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="nav-button mb-40">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach (App\Models\Category::select('id','name_'.Session::get('locale').' as name')->limit(4)->get() as $Category)
                                <a class="nav-link active" id="nav-{{$Category->id}}-tab" data-bs-toggle="tab" href="#nav-{{$Category->id}}"
                                    role="tab" aria-controls="nav-{{$Category->id}}" aria-selected="true">{{$Category->name}}</a>
                            @endforeach
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Nav Card -->
        <div class="tab-content" id="nav-tabContent">
            @foreach (App\Models\Category::limit(4)->get() as $Category)
                <div class="tab-pane fade show active" id="nav-{{$Category->id}}" role="tabpanel" aria-labelledby="nav-{{$Category->id}}-tab">
                    <!-- Tab 1 -->
                    <div class="row">
                        @foreach (App\Models\Product::select('id','name_'.Session::get('locale').' as name', 'price', 'stock', 'image1')->with(['authour:name_'.Session::get('locale').' as name'])->where('category_id',$Category->id)->orderBy('id')->limit(4)->get() as $Product)
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                <!-- Single -->
                                <div class="properties pb-20">
                                    <div class="properties-card">
                                        <div class="properties-img">
                                            <a href="Product/{{$Product->id}}"><img src="{{ $Product->image1 }}" alt="{{$Product->name}}"></a>
                                        </div>
                                        <div class="properties-caption">
                                            <h3><a href="Product/{{$Product->id}}">{{$Product->name}}</a></h3>
                                            @if ($Product->authour)
                                                <p><span>{{__('content.Authour')}}:</span> {{$Product->authour->name}}</p>
                                            @endif
                                            @if ($Product->stock > 0)
                                                <div>
                                                    <span style="color: #1C1C1C !important">{{__('content.InStock')}}</span>
                                                </div>
                                            @else
                                                <div>
                                                    <span style="color: #1C1C1C !important">{{__('content.OutOfStock')}}</span>
                                                </div>
                                            @endif
                                            <div class="properties-footer d-flex justify-content-between align-items-center">
                                                <div class="price">
                                                    <span style="color: #1C1C1C !important">{{$Product->price}} {{__('content.SR')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div class="row">
            <div class="col-xl-12">
                <div class="more-btn text-center mt-15">
                    <a href="#" class="border-btn border-btn2 more-btn2">Browse More</a>
                </div>
            </div>
        </div> --}}
    </div>
</section>
<!-- Latest-items End -->
