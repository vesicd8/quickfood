@extends("shared.layouts.layout")

@section("description", "")
@section("keywords", "keywords")
@section("title", "QuickFood | Porudžbine")

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
    <div class="col-md-6 mt-5 mx-auto">
        <div class="box_style_2 mt-5 col-12">
            <h2 class="inner text-center">Vaše porudžbine</h2>
            @if(session()->get('message'))
                <div class="col-12 mt-5 d-flex align-items-center justify-content-around success alert-success my-3 mx-auto">
                    <p class="text-center"> {{ session()->get('message') }}</p>
                </div>
            @endif
            <div class="row mt-categories-slider">
                <div class="col-12 padding-0">
                    @if($orders->count() == 0)
                        <p class="text-center">Nemate nijednu porudžbinu.</p>
                    @else
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table edit-options overflow-auto">
                                    <tbody>
                                    <tr class="text-left inbox-message unread">
                                        <td style="width:15%" class="p-2">
                                            ID
                                        </td>
                                        <td style="width:20%">
                                            Datum
                                        </td>
                                        <td style="width:35%" class="text-center">
                                            Addresa
                                        </td>
                                        <td style="width:10%">
                                            Status
                                        </td>
                                        <td style="width:20%">
                                            Informacije
                                        </td>
                                    </tr>
                                    @foreach($orders as $order)
                                        <tr class="inbox-message order-info">
                                            <td style="width:15%" class="p-2 unread">
                                                {{ $order->order_uuid }}
                                            </td>
                                            <td style="width:20%">
                                                {{ $order->date }}
                                            </td>
                                            <td style="width:35%" class="text-center">
                                                {{ $order->address }}
                                            </td>
                                            <td style="width:10%">
                                                {{ $order->status->status }}
                                            </td>
                                            <td style="width:20%">
                                                <a href="#" data-orderuuid="{{ $order->order_uuid }}" class="text-info view-order-info"> Pogledaj više </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('shared.fixed.footer')
    @include('shared.components.notification-modal')
    @include('public.components.order-info')
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
