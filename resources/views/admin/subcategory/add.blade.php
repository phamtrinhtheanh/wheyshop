@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="card card-primary m-2">
            <div class="card-header">
                <h3 class="card-title">Add new Category</h3>
            </div>
            <form action="" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" required value="{{old('name')}}" id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="text" class="form-control" name="slug" required value="{{old('slug')}}" id="exampleInputEmail1" placeholder="Slug Ex. URL">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="0">Active</option>
                            <option value="1">InActive</option>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" required value="{{old('meta_title')}}" id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meta Description</label>
                        <textarea class="form-control" name="meta_description" required value="{{old('meta_description')}}" id="exampleInputEmail1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keyword" required value="{{old('meta_keyword')}}" id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
