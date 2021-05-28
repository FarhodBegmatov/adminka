@extends('admin.layouts.app')

@section('header')
    @include('admin.includes.header')
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content-wrapper')
    <div class="content-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Форма для добавления товара</h3>
                        </div>
{{--                    {{$errors}}--}}
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ url('admin/products') }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Категория</label>
                                    <select class="form-control select2" style="width: 100%;" id="validationCustom03"
                                            name="category_id">
                                        <option >Выберите категория</option>
                                        @foreach($categories as $category)
                                            <option @if(old('category_id') == $category->id) selected @endif
                                                value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Названия товара</label>
                                    <input type="text" class="form-control" id="name"
                                           placeholder="Введите названия товара" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Описания</label>
                                    <textarea class="form-control" id="description" name="description"
                                              placeholder="Описания">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">Цена товара</label>
                                    <input type="text" class="form-control" id="price" placeholder="Введите цена товара"
                                           value="{{ old('price') }}" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="discount">Скидка</label>
                                    <input type="text" class="form-control" id="discount" placeholder="Скидка"
                                           value="{{ old('discount') }}" name="discount">
                                </div>
                                <div class="form-group">
                                    <label for="oldPrice">Старая цена товара</label>
                                    <input type="text" class="form-control" id="oldPrice" name="oldPrice"
                                           placeholder="Введите старая цена товара" value="{{ old('oldPrice') }}">
                                </div>
                                <div class="form-group">
                                    <label for="image">Выберите файл</label>
                                    <input type="file" id="image" name="image">
                                </div>
                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Добавить товар</button>
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

@section('customScript')
    <script type="text/javascript">
        $('#discount').on('change', function (e) {
            let discount = this.value();
            let price = $('#price').value();
            let oldPrice = $('#old_price').value();
            if (!oldPrice)
                oldPrice = price;

            price = oldPrice - ((oldPrice / 100) * 10)
            $('#price').value(price);
        })
    </script>
@endsection
