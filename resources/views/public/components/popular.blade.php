<div class="white_bg">
    <div class="container margin_60">
        <div class="main_title">
            <h2 class="nomargin_top">Choose from Most Popular</h2>
            <p>
                Cum doctus civibus efficiantur in imperdiet deterruisset.
            </p>
        </div>
        <div class="row">
            @for($i = 0; $i < 2; $i++)
                <div class="col-lg-6">
                    @for($j = 0; $j < 3; $j++)
                        <a href="{{ route('product.single', [ 'url' =>  $popularItems[$i == 0 ? $j : 3 + $j]->url ]) }}" class="strip_list">
                            <div class="ribbon_1">Popular</div>
                            <div class="desc">
                                <div class="thumb_strip">
                                    <img src="{{ asset("assets/img/products/" . $popularItems[$i == 0 ? $j : 3 + $j]->src )}} " alt="{{  $popularItems[$i == 0 ? $j : 3 + $j]->name }}">
                                </div>
                                <h3>{{ $popularItems[$i == 0 ? $j : 3 + $j]->name }}</h3>
                                <div class="type">
                                    {{$popularItems[$i == 0 ? $j : 3 + $j]->category->parent ? $popularItems[$i == 0 ? $j : 3 + $j]->category->parent->name." / ". $popularItems[$i == 0 ? $j : 3 + $j]->category->name : $popularItems[$i == 0 ? $j : 3 + $j]->category->name }}
                                </div>
                                <div class="location">
                                    <span> {{ $popularItems[$i == 0 ? $j : 3 + $j]->price()->unit_price }}.00 din </span>
                                </div>
                            </div>
                        </a>
                    @endfor
                </div>
            @endfor
        </div>
    </div>
</div>
