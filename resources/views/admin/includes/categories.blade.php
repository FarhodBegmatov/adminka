<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header col-lg-10 col-md-12">
                        <h3 class="box-title">Категории Товаров</h3>
                        <form method="GET" action="{{ route('admin.search') }}">
                            <input class="form-control me-2" style="margin: 8px auto;" type="search" id="s" name="s" placeholder="Поиск" aria-label="Search">
                            <button class="btn btn-primary" type="submit">Поиск</button>
                        </form>
                    </div>
                    <!-- /.box-header -->

                    @if(count($categories))
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Названия</th>
                                    <th>Статус</th>
                                    <th>
                                        <a href="{{ route('admin.categories.create') }}"><button class="btn btn-success" type="submit">Добавить</button></a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->status}}</td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', $category) }}"><button class="btn btn-primary fa fa-pencil" style=" margin-right: 6px;" type="submit"></button></a>
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"  style="display: contents;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger fa fa-trash" type="submit" onclick="return confirm('Do you want to delete? {{ $category->name }}')"></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $categories->appends(['s' => request()->s])->links() }}
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

