@extends('portal.master')

@section('plugins.Datatables', true)

@section('content')
    @yield('auth_content')
    @yield('content')
@stop

@section('js')
    @stack('js')
    @yield('js')
@stop