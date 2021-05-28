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
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Форма для добавления товара</h3>
                        </div>
{{--                        {{$errors}}--}}
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ url('admin/products/'.$product->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Категория</label>
                                    <select class="form-control select2" style="width: 100%;" id="validationCustom03" name="category_id">
                                        <option selected="selected">Выберите категория</option>
                                        @foreach($categories as $category)
                                            <option @if($product->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="productName">Названия товара</label>
                                    <input type="text" class="form-control" id="productName" name="name" placeholder="Введите названия товара" value="{{ $product->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Описания</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Описания">{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">Цена товара</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Введите цена товара" value="{{ $product->price }}">
                                </div>
                                <div class="form-group">
                                    <label for="discount">Скидка</label>
                                    <input type="text" class="form-control" id="discount" name="discount" placeholder="Скидка" value="{{ $product->discount }}">
                                </div><div class="form-group">
                                    <label for="oldPrice">Старая цена товара</label>
                                    <input type="text" class="form-control" id="oldPrice" name="old_price" placeholder="Введите старая цена товара" value="{{ $product->old_price }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Выберите файл</label>
                                    <input type="file" name="image" id="exampleInputFile" value="{{ $product->image }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url($product->image))}}" alt="image"
                                         class="img-fluid img-thumbnail"/>
                                </div>

                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Изменить товара</button>
                            </div>
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

