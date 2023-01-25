<!-- Best Selling start -->
<div id='best_selling' class="best-selling section-bg" style="background-color: #374659">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2 class="text-white">{{__('content.BestSelling')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="selling-active">
                    @foreach (App\Models\Product::select('id','name_'.Session::get('locale').' as name', 'price', 'stock', 'image1')->with(['authour:name_'.Session::get('locale').' as name'])->inRandomOrder()->limit(20)->get() as $Product)
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Best Selling End -->
