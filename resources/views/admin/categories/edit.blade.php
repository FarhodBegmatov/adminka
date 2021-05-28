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
            <div class="row justify-content-center">
                <div class="col-md-10">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="box box-primary" style="margin: 20px 90px;">
                        <div class="box-header with-border">
                            <h3 class="box-title">Форма для изменения категория</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="needs-validation" novalidate action="{{url('admin/categories/'.$category->id)}}"
                              method="POST">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Названия категория</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Введите названия категория" value="{{ $category->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="validationStatus">Status</label>
                                    <div class="input-group">
                                        <select name="status" class="form-control @error('status') is-invalid @enderror"
                                                id="validationStatus">
                                            <option value="10" @if($category->status == 10)  selected @endif >Active
                                            </option>
                                            <option value="0" @if($category->status == 0)  selected @endif>Inactive</option>
                                        </select>
                                        @error('status')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="box-footer" style="display: contents">
                                    <button type="submit" class="btn btn-primary">Изменить категория</button>
                                </div>
                            </div>

                            <!-- /.box-body -->

                        </form>
                    </div>
                </div></div></div>
    </div>
@endsection

@section('main-footer')
    @include('admin.includes.main-footer')
@endsection

@section('control-sidebar')
    @include('admin.includes.control-sidebar')
@endsection
