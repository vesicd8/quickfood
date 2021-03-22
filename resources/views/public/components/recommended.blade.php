<div class="row">
    <div class="box_style_2 mt-5 col-12">
        <h2 class="inner text-center">Slični proizvodi</h2>
        <div class="row mt-categories-slider">
            <div class="col-12 padding-0">
                <div class="owl-carousel owl-theme" id="categories-slider">
                    @foreach($product->category->products as $item)
                        @if($product->id == $item->id)
                            @continue
                        @endif
                        <a href="{{ route('product.single', ['url' => $item->url ]) }}">
                            <div class="item">
                                <div class="category-block-slider position-relative">
                                    <img src="{{ asset('assets/img/products/' . $item->src) }}" alt="{{ $item->name }}" class="img-fluid">
                                    <div class="category-more">
                                        <div>
                                            <h4 class="category-more-title">{{ $item->name }}</h4>
                                        </div>
                                    </div>
                                    <div class="categroy-click-more" data-categoryidshow="">
                                        <h4 class="category-more-title"></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
