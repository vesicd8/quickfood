@extends("shared.layouts.layout")

@section("description", $product->description)
@section("keywords", "keywords")
@section("title", "QuickFood | " . $product->name)

@section('css')
    @include('shared.assets.css')
@endsection

@section('header')
    @include('shared.fixed.header')
@endsection

@section('slider')
    <div style="width: 100%; background-color: #78cfcf; height: 51px;"></div>
@endsection

@section('content')

    <div id="position">
        <div class="container">
            <ul>
                <li>Kategorije <i class="fas fa-angle-right ml-1"></i></li>
                @foreach($position as $p)
                    <li>{{ $p }} @if(!$loop->last) <i class="fas fa-angle-right ml-1"></i> @endif</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="col-md-6 mx-auto my-5">
        @include('public.components.product-info')
        @include('public.components.reviews')
        @include('public.components.recommended')
    </div>


@endsection

@section('footer')
    @include('shared.fixed.footer')
    @include('shared.components.notification-modal')
    @if(session()->has('user'))
        @component('public.components.review-box', [
            'userReview' => $userReview,
            'action' => $action,
            'id' => $product->id,
            'method' => $method ])@endcomponent
    @endif
@endsection

@section('scripts')
    <script src="{{ asset("assets/js/owl.carousel.min.js") }}"></script>
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
