@extends('admin.layouts.app')

@section('header')
    @include('admin.includes.header')
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content-wrapper')
    @include('admin.includes.products')
@endsection

@section('main-footer')
    @include('admin.includes.main-footer')
@endsection

@section('control-sidebar')
    @include('admin.includes.control-sidebar')
@endsection







