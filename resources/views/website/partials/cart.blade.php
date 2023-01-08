<!--================Cart Area =================-->
<section class="cart_area section-padding" dir="{{__('content.dir')}}">
    <div class="container">
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
                        @endphp
                        @foreach ($OrderItems as $OrderItem)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <form id="deleteForm{{$OrderItem->id}}" method="POST" action="/cart/{{$OrderItem->id}}" class="checkout_btn_inner float-right">
                                                @method('Delete')
                                                @csrf
                                                <span onclick="document.getElementById('deleteForm{{$OrderItem->id}}').submit()">X</span>
                                            </form>
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
                                <h5>{{ ($Setting->delivery_price) }} {{__('content.SR')}}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>{{__('content.Total')}}</h5>
                            </td>
                            <td>
                                <h5>{{ ($sum + $Setting->delivery_price) }} {{__('content.SR')}}</h5>
                            </td>
                        </tr>
                        <tr class="shipping_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="shipping_box">
                                    <label>{{__('content.Address')}}</label>
                                    <input class="post_code" type="text" placeholder="Address" name="address" value="{{$Address}}" form="Checkout"/>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <form method="POST" action="/order" id="Checkout" class="checkout_btn_inner float-right">
                    @csrf
                    <button type="submit" class="btn checkout_btn" @if(count($OrderItems)==0) disabled @endif>{{__('content.Checkout')}}</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
