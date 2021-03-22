<section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset("assets/img/covers/menu-cover.jpg") }}" data-natural-width="1400" data-natural-height="470">
    <div id="subheader">
        <div id="sub_content">
            <div id="thumb">
                <img src="{{ asset("assets/img/products/" . $item->src) }}" alt="{{ $item->name }}">
            </div>
            <div class="rating">
                @if($item->reviews->count() == 0)
                    <i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i> (<small> 0 </small>)
                @else
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= floor($item->reviews->sum('pivot.stars') / $item->reviews->count()))
                            <i class="icon_star voted"></i>
                        @else
                            <i class="icon_star"></i>
                        @endif
                    @endfor
{{--                    <span class="small"> ({{ $item->reviews->count() }}) </span>--}}
                    (<small><a href="{{ route('product.single', ['url' => $item->url]) }}#summary_review"> {{ $item->reviews->count() }} recenzija/e</a></small>)
                @endif
            </div>
            <h1> {{ $item->name }}</h1>
            <div>
                <em> @if($item->category->parent){{ $item->category->parent->name }} / @endif {{ $item->category->name }}
                </em>
            </div>
            <div><strong>Cena:</strong> {{ $item->price()->unit_price }}rsd</div>
        </div>
    </div>
</section>

{{--<div class="rating">
<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
 (<small><a href="detail_page_2.html">Read 98 reviews</a></small>)
</div>--}}
