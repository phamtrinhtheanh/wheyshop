@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Tables</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/product/add') }}" class="btn btn-primary">Add new Product</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.layouts._message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Product List</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Category ID</th>
                                            <th>SubCategory ID</th>
                                            <th>Slug</th>
                                            <th>Old Price</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentRecord as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->title }}</td>
                                                <td>{{ $category->category_id }}</td>
                                                <td>{{ $category->subcategory_id }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>{{ $category->old_price }}</td>
                                                <td>{{ $category->price }}</td>
                                                <td class="text-nowrap">
                                                    <a class="btn btn-primary"
                                                        href="{{ url('admin/product/edit/' . $category->id) }}">Edit</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ url('admin/product/delete/' . $category->id) }}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float: right;">
                                    {{ $currentRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
