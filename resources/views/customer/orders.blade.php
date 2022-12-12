@extends('website.layout.main')
@section('title', __('content.Orders'))
@section('content')
<section class="cart_area section-padding" dir="{{__('content.dir')}}">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{__('content.orderStatus')}}</th>
                            <th scope="col">{{__('content.orderTo')}}</th>
                            <th scope="col">{{__('content.orderDate')}}</th>
                            <th scope="col">{{__('content.totalPrice')}}</th>
                            <th scope="col">{{__('content.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Orders as $Order)
                            @php
                                $Total=0;
                                foreach($Order->orderItems as $item){
                                    $Total+=($item->quantity * $item->price);
                                }
                            @endphp
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
                                    <h5> {{ $Total }} {{__('content.SR')}}</h5>
                                </td>
                                <td>
                                    @if ($Order->order_status_id == 1)
                                        <form method="POST" action="/order/{{$Order->id}}" id="cancelOrderForm{{$Order->id}}">
                                            @csrf
                                            @method('PUT')
                                            <span class="text-primary" onclick="document.getElementById('cancelOrderForm{{$Order->id}}').submit()"><i class="fa fa-trash mx-1" aria-hidden="true"></i>{{__('content.cancleOrder')}}</span><br><br>
                                        </form>
                                    @endif
                                    <a class="text-primary" href="/order/{{$Order->id}}"><i class="fa fa-eye mx-1" aria-hidden="true"></i>{{__('content.view')}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
