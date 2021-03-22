<div class="row">
    <div class="box_style_2 mt-5 col-12">
        <h2 class="inner text-center">Recenzije</h2>
        <div id="summary_review">
            <div id="general_rating">
                {{ $product->reviews->count() }} Reviews
                <div class="rating ml-5">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $numberOfStars)
                            <i class="icon_star voted"></i>
                        @else
                            <i class="icon_star"></i>
                        @endif
                    @endfor
                </div>
            </div>
            <hr class="styled">
            @if(session()->has('user'))
                @if(count(session()->get('user')->getReview($product->id)->reviews) != 0   )
                    <a href="#" class="btn_1 add_bottom_15" data-toggle="modal" data-target="#myReview">Izmeni recenziju</a>
                @else
                    <a href="#" class="btn_1 add_bottom_15" data-toggle="modal" data-target="#myReview">Oceni proizvod</a>
                @endif
            @else
                <p>Morate se <a href="#" data-toggle="modal" data-target="#login_2"> ulogovati </a> kako bi ostavili komentar.</p>
            @endif
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mb-5">
                @foreach ($errors->all() as $error)
                    <p class="text-center">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session()->get('success'))
            <div class="success alert-success mb-5">
                <p class="text-center">{{ session()->get('success') }}</p>
            </div>
        @endif

        @foreach($product->reviews as $review)
            <div class="review_strip_single">
                <img src="{{ asset("assets/img/avatar.png") }}" alt="{{ $review }}" style="width: 68px;" class="rounded-circle img-fluid">
                <small class="mr-3"> - {{ $review->pivot->date }} -</small>
                <h4>{{ $review->first_name }} {{ $review->last_name }}</h4>
                <p class="font-weight-bolder">
                    {{ $review->pivot->comment }}
                </p>
                <div class="row">
                    <div class="container d-flex align-items-center justify-content-between">
                        <div class="col-md-3 mt-3">
                            <div class="rating">
                                <span class="text-dark font-weight-bold font-italic mr-5">Ocena: </span>
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($review->pivot->stars))
                                        <i class="icon_star voted"></i>
                                    @else
                                        <i class="icon_star"></i>
                                    @endif
                                @endfor
                                <br/>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            @if(session()->has('user'))
                                @if(session()->get('user')->role->role == "Admin" || session()->get('user')->id == $review->pivot->user_id)
                                    <form action="{{ route('product.review.delete', ['id' => $review->pivot->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-danger btn-sm" type="submit" value="Obriši"/>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
