@extends('admin.layouts.app')

@section('header')
    @include('admin.includes.header')
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content-wrapper')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-8">
                    <div class="box">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">Users</div>
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Roles</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr>
                                                        <th scope="row">{{ $user->id }}</th>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                                        <td>
                                                            @can('edit-users')
                                                                <a href="{{ route('admin.users.edit', $user->id) }}">
                                                                    <button type="button" class="btn-sm btn-primary float-left m-1">
                                                                        Edit
                                                                    </button>
                                                                </a>
                                                            @endcan
                                                            @can('delete-users')
                                                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                                                      class="float-left m-1" style="display: contents">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn-sm btn-danger">Delete</button>
                                                                </form>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('main-footer')
    @include('admin.includes.main-footer')
@endsection

@section('control-sidebar')
    @include('admin.includes.control-sidebar')
@endsection
