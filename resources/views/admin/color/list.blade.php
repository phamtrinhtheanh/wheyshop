@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Color Tables</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/color/add') }}" class="btn btn-primary">Add new Color</a>
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
                                <h3 class="card-title">Color List</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Code</th>
                                            <th>Created by</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentRecord as $record)
                                            <tr>
                                                <td>{{ $record->id }}</td>
                                                <td>{{ $record->title }}</td>
                                                <td>{{ $record->code }}</td>
                                                <td>{{ $record->created_by_name }}</td>
                                                <td class="text-nowrap">
                                                    <a class="btn btn-primary"
                                                        href="{{ url('admin/color/edit/' . $record->id) }}">Edit</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ url('admin/color/delete/' . $record->id) }}">Delete</a>
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
