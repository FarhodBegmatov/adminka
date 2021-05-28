@extends('admin.layouts.app')

@section('header')
    @include('admin.includes.header')
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content-wrapper')
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center" style="margin: 20px 90px;">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Форма для добавления категория</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="needs-validation" novalidate action="{{ route('admin.categories.index') }}"
                              method="POST">
                            @csrf
                            @method('POST')
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Названия категория</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Введите названия категория" value="{{ old('name') }}">
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Добавить категория</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-footer')
    @include('admin.includes.main-footer')
@endsection

@section('control-sidebar')
    @include('admin.includes.control-sidebar')
@endsection
