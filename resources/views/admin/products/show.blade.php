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
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-6" style="margin-top: 25px;">
                <div class="form-group col-md-3">
                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url($product->image))}}" alt="image"
                         class="img-fluid" width="500" height="400"/>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card-body">
                    <h1 class="card-title">{{ $product->name }}</h1>
                    <h3 class="card-title">Описания</h3>
                    <p class="card-text">{{ $product->description }}</p>
                    <h3 class="card-title">Цена</h3>
                    <span><b>{{ $product->price }}</b></span>
                    <h3 class="card-title">Скидка</h3>
                    <span><i>{{ $product->discount }}</i></span>
                    <h3 class="card-title">Старая цена</h3>
                    <span><strike>{{ $product->old_price }}</strike></span>
                    <p class="card-text"><small class="text-muted">{{ $product->updated_at }}</small></p>
                </div>
                <div>
                    <a href="{{ route('admin.products.edit', $product) }}"> <button type="submit" class="btn btn-primary">Изменить товара</button></a>
                    <a href="{{ route('admin.products.index') }}"> <button type="submit" class="btn btn-primary">Назад к списку</button></a>
                </div>
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







