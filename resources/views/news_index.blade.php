@extends('layouts.layout')

@section('mob_menu')
    {!! $mob_menu !!}
@endsection

@section('menu')
    {!! $menu !!}
@endsection

@section('content')
    {!! $content !!}
@endsection

@section('mailing')
    @include('mailing')
@endsection

@section('footer')
    {!! $footer !!}
@endsection