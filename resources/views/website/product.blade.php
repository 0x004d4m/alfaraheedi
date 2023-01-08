@extends('website.layout.main')
@section('title', $Product->name)
@section('content')
<!--  services-area start-->
<div class="services-area2">
    <div class="container">
        <div class="row">
            @if(Session::has('Success'))
                <div class="col-md-12">
                    <div class="alert alert-success">{{ Session::get('Success') }}</div>
                </div>
            @endif
            @if(Session::has('Error'))
                <div class="col-md-12">
                    <div class="alert alert-danger">{{ Session::get('Error') }}</div>
                </div>
            @endif
            <div class="col-xl-12">
                <div class="row" dir="{{__('content.dir')}}">
                    <div class="col-xl-12">
                        <!-- Single -->
                        <div class="single-services d-flex align-items-center mb-0" style="background-color: #EAF6F6;">
                            <div class="features-img" style="width: 20%;" >
                                <img style="width: 100%;" src="{{url($Product->image1)}}" alt="{{$Product->name}}">
                            </div>
                            <div class="features-caption text-dark mx-4">
                                <h3 class="text-dark">{{$Product->name}}</h3>
                                @if ($Product->authour)
                                    <p><span>{{__('content.Authour')}}:</span> {{$Product->authour->name}}</p>
                                @endif
                                @if ($Product->stock > 0)
                                    <div class="price">
                                        <span class="text-dark">{{__('content.InStock')}}</span>
                                    </div>
                                @else
                                    <div class="price">
                                        <span class="text-dark">{{__('content.OutOfStock')}}</span>
                                    </div>
                                @endif
                                <div class="properties-footer d-flex justify-content-between align-items-center">
                                    <div class="price">
                                        <span class="text-dark">{{$Product->price}} {{__('content.SR')}}</span>
                                    </div>
                                </div>
                                <div class="properties-footer d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-dark">{{__('content.Tax')}}: {{$Product->tax}} %</span>
                                    </div>
                                </div>
                                <form class="d-flex" method="post" action="/cart">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$Product->id}}">
                                    <button type="submit" name="addToCart" class="btn btn-white text-dark mr-10 mb-2 mx-2 d-flex justify-content-between" style="background-color: white; color: black!important;">{{__('content.AddtoCart')}}</button>
                                    <input type="number" name="quantity" class="form-control mb-2" placeholder="{{__('content.Quantity')}}" min="1" max="{{$Product->stock}}" required style="width: 30%!important;">
                                </form>
                                {{-- <a href="#" class="border-btn share-btn"><i class="fas fa-share-alt"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- services-area End-->

<!--Books review Start -->
<section class="our-client section-padding best-selling" dir="{{__('content.dir')}}">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="nav-button f-{{__('content.dir2')}}">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs " id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-one-tab" data-bs-toggle="tab" href="#nav-one"
                                role="tab" aria-controls="nav-one" aria-selected="true">{{__('content.Description')}}</a>
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
            <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                <!-- Tab 1 -->
                <div class="row">
                    <div class="col-md-6">
                        @if ($Product->image2)
                            <img style="width: 100%;" src="{{url($Product->image2)}}" alt="{{$Product->name}}"><br><br>
                        @endif
                        @if ($Product->image3)
                            <img style="width: 100%;" src="{{url($Product->image3)}}" alt="{{$Product->name}}"><br><br>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <p>{!! $Product->description!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Books review End -->


@endsection
