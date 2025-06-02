@extends('portal.master')

@section('title')
    @yield('template_title')
@stop

@section('css')
    @yield('template_linked_css')
@stop


@section('js')
    @include('laravelusers::scripts.toggleText')
    @yield('template_scripts')
    <script>
        function checkChanged() {
            $(".btn-save").show();
        }
    </script>
@stop
