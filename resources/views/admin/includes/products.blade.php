<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header col-lg-6 col-md-12">
                        <h3 class="box-title">Все товары</h3>
                        <form class="d-flex" method="GET" action="{{ route('admin.searchProduct') }}">
                            <input class="form-control me-2" style="margin: 8px auto;" id="p" name="p" type="search" placeholder="Поиск" aria-label="Search">
                            <button class="btn btn-primary" type="submit">Поиск</button>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    @if(count($products))
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Названия</th>
                                    <th>Описания</th>
                                    <th>Категория</th>
                                    <th>Цена</th>
                                    <th>Дискоунт</th>
                                    <th>Старая цена</th>
                                    <th>Статус</th>
                                    <th>
                                        <a href="{{ route('admin.products.create')}}"><button class="btn btn-success" type="submit">Добавить товар</button></a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td> {{ $product->category->name }}</td>
                                        <td> {{ $product->price }}</td>
                                        <td> {{ $product->discount }}</td>
                                        <td> {{ $product->old_price = $product->price + $product->discount }}</td>
                                        <td> {{ $product->status }}</td>
                                        <td>
                                            <a href="{{ route('admin.products.show', $product) }}"><button class="btn btn-info fa fa-eye" type="submit"></button></a>
                                            <a href="{{ route('admin.products.edit', $product) }}"><button class="btn btn-primary fa fa-pencil" type="submit"></button></a>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: contents">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger fa fa-trash" type="submit" onclick="return confirm('Do you want to delete? {{ $product->name }}')"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $products->appends(['p' => request()->p])->links() }}
                        </div>
                        <!-- /.box-body -->
                    @else
                        <div class="alert alert-info" style="margin: 120px auto;">
                            <p>Запись не найдено</p>
                        </div>
                    @endif
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
