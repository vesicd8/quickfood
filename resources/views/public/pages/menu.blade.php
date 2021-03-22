@extends("shared.layouts.layout")

@section("description", "Description")
@section("keywords", "keywords")
@section("title", "QuickFood | Meni")

@section('css')
    @include('public.assets.css')
@endsection

@section('header')
    @include('shared.fixed.header')
@endsection

@section('slider')
    @if($item != null)
        @component('public.components.menu-slide', [
        'item' => $item
    ])@endcomponent
    @else
        <div style="width: 100%; background-color: #78cfcf; height: 51px;"></div>
    @endif
@endsection

@section('content')
    <div class="col-6 mx-auto">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger mb-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->get('error'))
                    <div class="col-12 d-flex align-items-center justify-content-around alert alert-danger my-3 mx-auto">
                        <p class="text-center"> {{ session()->get('error') }} </p>
                    </div>
            @endif
        </div>
    </div>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-3">
                @if(session()->has('user'))
                    @include('public.components.cart')
                @endif
                @include('public.components.filters')
            </div>

            <div class="col-lg-9">
                @if(count($products) != 0)
                    <?php $count = 1; ?>
                    @foreach($products as $product)
                        @if($count == 1)
                            <div class="row">
                                @endif
                                <div class="col-md-6 wow zoomIn" data-wow-delay="0.1s">
                                    <a class="strip_list grid" href="{{ route('product.single', ['url' => $product->url]) }}">
                                        @if($product->label->label == "Popularno") <div class="ribbon_1">Popular</div> @endif
                                        @if($product->label->label == "Akcija") <div class="ribbon_2">Discount</div> @endif
                                        <div class="desc">
                                            <div class="thumb_strip">
                                                <img src="{{ asset("assets/img/products/" . $product->src) }}" alt="{{ $product->name }}">
                                            </div>
                                            <div class="rating">
                                                @if($product->reviews->count() == 0)
                                                    <i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i> <span class="small"> (0) </span>
                                                @else
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= floor($product->reviews->sum('pivot.stars') / $product->reviews->count()))
                                                            <i class="icon_star voted"></i>
                                                        @else
                                                            <i class="icon_star"></i>
                                                        @endif
                                                    @endfor
                                                    <span class="small"> ({{ $product->reviews->count() }}) </span>
                                                @endif
                                            </div>
                                            <h3>{{ $product->name }}</h3>
                                            <div class="type">
                                                {{ $product->category->parent ? $product->category->parent->name." / ". $product->category->name : $product->category->name }}
                                            </div>
                                            <div class="location text-center">
                                                <p class="font-weight-bold mx-0"> Količina: {{ round($product->unit_value, 2) . $product->unit->unit }}</p>
                                            </div>
                                            <ul>
                                                @if($product->label->label == "Akcija")
                                                    @if($product->oldPrice())
                                                        <li class="font-weight-bold mx-0 small"> <del>{{ $product->oldPrice()->unit_price }}.00 </del></li>
                                                    @endif
                                                @endif
                                                <li class="font-weight-bold mx-0"> {{ $product->unit_price }}.00 din</li>
                                            </ul>
                                            <div class="mt-3">
                                                <input data-product="{{ $product->id }}" type="button" class="btn_1 addToCart" value="Dodaj u korpu"/>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php $count++; ?>
                                @if($count == 3 || $loop->last)
                            </div>
                            <?php $count = 1; ?>
                        @endif
                    @endforeach
                    <div class="col-12 d-flex align-items-center justify-content-around">
                        {{ $products->links() }}
                    </div>
                @else
                    <p class="text-center">Nema proizvoda.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('shared.components.notification-modal')
    @include('public.components.complete-order-box')
    @include('shared.fixed.footer')
@endsection

@section('scripts')
    <script src="{{ asset("assets/js/cat_nav_mobile.js") }}"></script>
    <script>$('#cat_nav').mobileMenu();</script>
    <script src="{{ asset("assets/js/ResizeSensor.min.js") }}"></script>
    <script src="{{ asset("assets/js/theia-sticky-sidebar.min.js") }}"></script>
    <script>
        jQuery('#sidebar').theiaStickySidebar({
            additionalMarginTop: 80
        });
    </script>
    @include('public.assets.js')
@endsection
