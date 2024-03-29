@extends('website.layout.main')
@section('title', __('content.Store'))
@section('content')

<!-- listing Area Start -->
<div class="listing-area pt-50 pb-50">
    <div class="container">
        <div class="row" dir="{{__('content.dir')}}">
            <!--? Left content -->
            <div class="col-xl-4 col-lg-4 col-md-6">
                <form id="filterForm" method="GET">
                    <!-- Job Category Listing start -->
                    <div class="category-listing mb-50">
                        <!-- single one -->
                        <div class="single-listing">
                            @if (count($Categories)>0)
                                <!-- select-Categories  -->
                                <div class="select-Categories pb-30">
                                    <div class="small-tittle mb-20">
                                        <h4>{{__('content.FilterbyCategory')}}</h4>
                                    </div>
                                    @foreach ($Categories as $Category)
                                        @if (Request::has('category_id') && in_array($Category->id,Request::get('category_id')))
                                            <label class="container">{{$Category->name}}
                                                <input type="checkbox" name="category_id[]" value="{{$Category->id}}" onclick="document.getElementById('filterForm').submit()" checked="checked active">
                                                <span class="checkmark"></span>
                                            </label>
                                        @else
                                            <label class="container">{{$Category->name}}
                                                <input type="checkbox" name="category_id[]" value="{{$Category->id}}" onclick="document.getElementById('filterForm').submit()">
                                                <span class="checkmark"></span>
                                            </label>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- select-Categories End -->
                            @endif

                            <!-- Range Slider Start -->
                            <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow mb-40">
                                <div class="small-tittle">
                                    <h4>{{__('content.FilterbyISBN')}}</h4>
                                </div>
                                <div class="widgets_inner">
                                    @if (Request::has('isbn'))
                                        <input type="text" class="form-control" name="isbn" value="{{Request::get('isbn')}}"/>
                                    @else
                                        <input type="text" class="form-control" name="isbn"/>
                                    @endif
                                </div>
                            </aside>
                            <!-- range end -->

                            @if (count($Authours)>0)
                                <!-- select-Categories start -->
                                <div class="select-Categories">
                                    <div class="small-tittle mb-20">
                                        <h4>{{__('content.FilterbyAuthorName')}}</h4>
                                    </div>
                                    @foreach ($Authours as $Authour)
                                        @if (Request::has('authour_id') && in_array($Authour->id,Request::get('authour_id')))
                                            <label class="container">{{$Authour->name}}
                                                <input type="checkbox" name="authour_id[]" value="{{$Authour->id}}" onclick="document.getElementById('filterForm').submit()" checked="checked active">
                                                <span class="checkmark"></span>
                                            </label>
                                        @else
                                            <label class="container">{{$Authour->name}}
                                                <input type="checkbox" name="authour_id[]" value="{{$Authour->id}}" onclick="document.getElementById('filterForm').submit()">
                                                <span class="checkmark"></span>
                                            </label>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- select-Categories End -->
                            @endif
                        </div>
                    </div>
                    <!-- Job Category Listing End -->
                </form>
            </div>
            <!--?  Right content -->
            <div class="col-xl-8 col-lg-8 col-md-6">
                <div class="best-selling p-0">
                    <div class="row">
                        @foreach ($Products as $Product)
                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                                <div class="properties pb-30">
                                    <div class="properties-card">
                                        <div class="properties-img">
                                            <a href="Product/{{$Product->id}}"><img src="{{ $Product->image1 }}" alt="{{$Product->name}}"></a>
                                        </div>
                                        <div class="properties-caption properties-caption2">
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
                <!-- button -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="more-btn text-center mt-15">
                            {{ $Products->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- listing-area Area End -->


@endsection
