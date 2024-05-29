@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category Tables</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{url('admin/subcategory/add')}}" class="btn btn-primary">Add new SubCategory</a>
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
                                <h3 class="card-title">SubCategory List</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Meta title</th>
                                            <th>Meta description</th>
                                            <th>Meta keyword</th>
                                            <th>Created by</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentRecord as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->category_name}}</td>
                                                <td>{{$category->slug}}</td>
                                                <td>{{$category->status == 1 ? "Active" : "Inactive"}}</td>
                                                <td>{{$category->meta_title}}</td>
                                                <td>{{$category->meta_description}}</td>
                                                <td>{{$category->meta_keywords}}</td>
                                                <td>{{$category->created_by_name}}</td>
                                                <td class="text-nowrap">
                                                    <a class="btn btn-primary" href="{{url('admin/subcategory/edit/'. $category->id)}}">Edit</a>
                                                    <a class="btn btn-danger" href="{{url('admin/subcategory/delete/'.$category->id)}}">Delete</a>
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
