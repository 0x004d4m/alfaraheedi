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
                                <th scope="col">{{__('content.Price')}}</th>
                                <th scope="col">{{__('content.Tax')}}</th>
                                <th scope="col">{{__('content.Quantity')}}</th>
                                <th scope="col">{{__('content.Total')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sum=$Order->delivery_price;
                            @endphp
                            @foreach ($Order->orderItems as $OrderItem)
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
                                    <td>
                                        <h5>{{$OrderItem->price}} {{__('content.SR')}}</h5>
                                    </td>
                                    <td>
                                        <h5>{{$OrderItem->tax}} %</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            {{$OrderItem->quantity}}
                                        </div>
                                    </td>
                                    <td>
                                        <h5> {{ ($OrderItem->quantity * $OrderItem->price + ( $OrderItem->quantity * ($OrderItem->price * $OrderItem->tax/100))) }} {{__('content.SR')}}</h5>
                                    </td>
                                </tr>
                                @php
                                    $sum+=($OrderItem->quantity * $OrderItem->price + ( $OrderItem->quantity * ($OrderItem->price * $OrderItem->tax/100)));
                                @endphp
                            @endforeach
                            <tr>
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
                                <td>
                                    <h5>{{__('content.Total')}}</h5>
                                </td>
                                <td>
                                    <h5>{{ ($sum) }} {{__('content.SR')}}</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection
