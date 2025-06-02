@extends('adminlte::page')

@section('meta_tags')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RW51TYX51S"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-RW51TYX51S');
    </script>
@endsection

@section('css')
    <style>
        .main-footer {
            background-color: #343a40;
        !important;
            border: 0 !important;
        }

        a.text-muted:hover {
            color: white !important;
        }
    </style>
@append


@include('portal.partials.footer')