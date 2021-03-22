@extends("shared.layouts.layout")

@section("description", "Page is not found!")
@section("keywords", "page, not, found")
@section("title", "QuickFood | Page not found")

@section('header')
    @include('shared.fixed.header')
@endsection

@section('content')

<div class="col-12" style="min-height: 40vh;">
    <div class="row">
        <h1>Oops!</h1>
        <p>Page is not found! Error code 404.</p>
    </div>
</div>

@endsection

@section('footer')
    @include('shared.fixed.footer')
@endsection


