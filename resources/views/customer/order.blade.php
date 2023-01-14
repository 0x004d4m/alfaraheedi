@extends('website.layout.main')
@section('title', __('content.orderDetails'))
@section('content')
    <section class="cart_area section-padding pb-0" dir="{{__('content.dir')}}">
        <div class="container">
            <h3>{{__('content.orderDetails')}}</h3>
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{__('content.orderStatus')}}</th>
                                <th scope="col">{{__('content.orderTo')}}</th>
                                <th scope="col">{{__('content.orderDate')}}</th>
                                <th scope="col">{{__('content.totalPrice')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h5>{{$Order->orderStatus->name}}</h5>
                                </td>
                                <td>
                                    <h5>{{$Order->address}}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        {{$Order->created_at}}
                                    </div>
                                </td>
                                <td>
                                    <h5> {{ $Order->total }} {{__('content.SR')}}</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================Cart Area =================-->
    <section class="cart_area section-padding" dir="{{__('content.dir')}}">
        <div class="container">
            <h3>{{__('content.orderItems')}}</h3>
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{__('content.Product')}}</th>
                                <th scope="col" class="text-center">{{__('content.Price')}}</th>
                                <th scope="col" class="text-center">{{__('content.Tax')}}</th>
                                <th scope="col" class="text-center">{{__('content.Quantity')}}</th>
                                <th scope="col" class="text-center">{{__('content.Total')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sum=0;
                                $discount=0;
                            @endphp
                            @foreach ($Order->orderItems as $OrderItem)
                                @php
                                    $price = ($OrderItem->quantity * $OrderItem->price + ( $OrderItem->quantity * ($OrderItem->price * $OrderItem->tax/100)));
                                    $price2 = ($OrderItem->quantity * ($OrderItem->price * $OrderItem->discount_value/100));
                                @endphp
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{url($OrderItem->product->image1)}}" />
                                            </div>
                                            <div class="media-body">
                                                <p>{{$OrderItem->product->name}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <h5>{{$OrderItem->price}}{{__('content.SR')}}</h5>
                                    </td>
                                    <td class="text-center">
                                        <h5>{{$OrderItem->tax}} %</h5>
                                    </td>
                                    <td class="text-center">
                                        <div class="product_count">
                                            {{$OrderItem->quantity}}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <h5> {{ $price }} {{__('content.SR')}}</h5>
                                    </td>
                                </tr>
                                @php
                                    $sum+=$price;
                                    $discount+=$price2;
                                @endphp
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>{{__('content.SubTotal')}}</h5>
                                </td>
                                <td>
                                    <h5>{{ ($sum) }} {{__('content.SR')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>{{__('content.Delivery')}}</h5>
                                </td>
                                <td>
                                    <h5>{{ ($Order->delivery_price) }} {{__('content.SR')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>{{__('content.Discount')}}</h5>
                                </td>
                                <td>
                                    <h5>{{ $discount }} {{__('content.SR')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>{{__('content.Total')}}</h5>
                                </td>
                                <td>
                                    <h5>{{ (($sum + $Order->delivery_price)-$discount) }} {{__('content.SR')}}</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="shipping_box">
                                        <label>{{__('content.Address')}}</label>
                                        <input class="post_code" type="text" placeholder="Address" value="{{$Order->address}}" readonly/>
                                    </div>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="shipping_box">
                                        <label>{{__('content.Discount')}}</label>
                                        <input class="post_code" type="text" value="{{ $Order->code }}" readonly/>
                                    </div>
                                    <div class="shipping_box">
                                        <label>{{__('content.name')}}</label>
                                        <input class="post_code" type="text" value="{{ $Order->name }}" readonly/>
                                    </div>
                                    <div class="shipping_box">
                                        <label>{{__('content.card_number')}}</label>
                                        <input class="post_code" type="text" value="{{ $Order->card_number }}" readonly/>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection
