@extends("shared.layouts.layout")

@section("description", "Description")
@section("keywords", "keywords")
@section("title", "QuickFood | Početna")

@section('css')
    <link rel="stylesheet" href="{{ asset("assets/layerslider/css/layerslider.css") }}"/>
@endsection

@section('header')
    @include('shared.fixed.header')
@endsection

@section('slider')
    @component('shared.components.parallax', [
    'src' => $src,
    'header' => "Quick Food",
    'text' => "Dostava #1 u Beogradu."
])@endcomponent
@endsection

@section('content')
    @include('public.components.index-info')
    @if($popularItems->count() == 6)
        @include('public.components.popular')
    @endif

    <div class="high_light">
        <div class="container">
            <h3>Choose from over 2,000 Restaurants</h3>
            <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p>
            <a href="{{ route('menu') }}">Pogledajte meni</a>
        </div>
    </div>

    @component('shared.components.parallax', [
    'src' => 'assets/img/parallax/cover4.jpg',
    'header' => "Dostava do vaše kancelarije!",
    'text' => ""
])@endcomponent



@endsection

@section('footer')
    @include('shared.fixed.footer')
@endsection

@section('scripts')
    <script src="{{ asset("assets/js/jquery-migrate.min.js") }}"></script>
    <script src="{{ asset("assets/layerslider/js/greensock.js") }}"></script>
    <script src="{{ asset("assets/layerslider/js/layerslider.transitions.js") }}"></script>
    <script src="{{ asset("assets/layerslider/js/layerslider.kreaturamedia.jquery.js") }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            'use strict';
            $('#layerslider').layerSlider({
                autoStart: true,
                responsive: true,
                responsiveUnder: 1280,
                layersContainer: 1170,
                navButtons:false,
                showCircleTimer:false,
                navStartStop:false,
                skinsPath: '{{ asset("assets/layerslider/skins/") }}'
            });
        });
    </script>
@endsection
