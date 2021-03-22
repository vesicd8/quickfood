<div class="row">
    <div class="col-md-6">
        <img class="img-fluid" src="{{ asset("assets/img/products/" . $product->src) }}" alt="{{ $product->name }}"/>
    </div>
    <div class="col-md-6 border">
        @if($product->label->label == "Popularno")
            <div class="ribbon_1">Popular</div>
        @endif
            @if($product->label->label == "Akcija")
                <div class="ribbon_2">Popular</div>
            @endif
        <div class="rating">
            <h3 class="text-left ml-3 font-weight-bold">{{ $product->name }}
                <span class="ml-3 small">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $numberOfStars)
                            <i class="icon_star voted"></i>
                        @else
                            <i class="icon_star"></i>
                        @endif
                    @endfor
                </span>
            </h3>
        </div>
        <hr>
        <p class="h3">Cena: <strong>
                {{ $product->price()->unit_price }}.00 rsd
                @if($product->label->label == "Akcija")
                    @if($product->oldPrice())
                        <del class="small"><small>{{ $product->oldPrice()->unit_price }}.00 </small></del>
                    @endif
                @endif
            </strong></p>
        <p class="small"><span class="text-danger">*</span>Porez je uključen u cenu</p>
        <hr>
        <p class="h3 font-weight-bold font-italic">Količina: {{ round($product->unit_value, 2) . " ". $product->unit->unit }}</p>
        @if($product->ingredients()->count() != 0)
            <hr/>
            <p class="h4 font-weight-bolder">Sastojci:</p>
            @foreach($product->ingredients as $ingredient)
                <p> {{ $ingredient->ingredient }}{{ $loop->last ? "" : "," }}</p>
            @endforeach
        @endif
        <hr>
        <div class="col-12 px-0">
            <div class="row">
                <div class="col-2 pr-0">
                    <input type="number" class="form-control" value="1" id="itemCount"/>
                </div>
                <div class="col-6">
                    <input type="button" id="btnAddToCart" class="btn_1 form-control" data-product="{{ $product->id }}" value="Dodaj u korpu"/>
                </div>
            </div>
            <div class="row">
                <div id="social_footer" class="px-0">
                    <ul>
                        <li class="ml-3 font-weight-bold text-uppercase">Podeli: </li>
                        <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.google.com/" target="_blank"><i class="fab fa-google"></i></a></li>
                        <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
