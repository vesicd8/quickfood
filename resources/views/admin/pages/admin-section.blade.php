@extends("shared.layouts.layout")

@section("description", "Description")
@section("keywords", "keywords")
@section("title", "QuickFood | Admin")

@section('css')
    @include("admin.assets.css")
@endsection

@section('header')
    @include('shared.fixed.header')
@endsection

@section('slider')
    @component('shared.components.parallax', [
    'header' => 'Admin',
    'text' => "",
    'src' => $src
])@endcomponent
@endsection

@section('content')

    <div class="container margin_60">
        <div id="tabs" class="tabs">

            <div class="content">

                @include('admin.components.tabs.tabs-nav')

                @include('admin.components.tabs.products-tab')

                @component('admin.components.tabs.categories-tab', [
                    'categories' => $categories
                ])
                @endcomponent

                @include('admin.components.tabs.ingredients-tab')

                @include('admin.components.tabs.labels-tab')

                @include('admin.components.tabs.reviews-tab')

                @component('admin.components.tabs.users-tab', [
                    'users' => $users->users
                ])@endcomponent

                @component('admin.components.tabs.messages-tab', [
                    'messages' => $messages->messages ])
                @endcomponent

{{--                @include('admin.components.tabs.account-tab')--}}

            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('shared.fixed.footer')
    @include('shared.components.notification-modal')
@endsection

@section('scripts')
    <script src="{{ asset("assets/js/tabs.js") }}"></script>
    <script>
        new CBPFWTabs(document.getElementById('tabs'));
    </script>
    <script src="{{ asset("assets/js/editor/summernote-bs4.min.js") }}"></script>
    <script>
        $('.wysihtml5').summernote({
            fontSizes: ['10', '14'],
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['fontsize', ['fontsize']],
                ['para', ['ul', 'ol', 'paragraph']]
            ],
            placeholder: 'Write here your description....',
            tabsize: 2,
            height: 200
        });
    </script>
    <script src='{{ asset("assets/js/fontawesome.min.js") }}'></script>
{{--    <script src="{{ asset("assets/js/dropzone.min.js") }}"></script>--}}
{{--    <script>--}}
{{--        if ($('.dropzone').length > 0) {--}}
{{--            Dropzone.autoDiscover = false;--}}
{{--            $("#photos").dropzone({--}}
{{--                maxFiles: 1,--}}
{{--                addRemoveLinks: true--}}
{{--            });--}}

{{--            $("#logo_picture").dropzone({--}}
{{--                maxFiles: 1,--}}
{{--                addRemoveLinks: true--}}
{{--            });--}}

{{--            $(".menu-item-pic").dropzone({--}}
{{--                maxFiles: 1,--}}
{{--                addRemoveLinks: true--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
    <script src="{{ asset("assets/js/main.js") }}"></script>
@endsection
