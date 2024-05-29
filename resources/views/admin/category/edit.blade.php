@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="card card-primary m-2">
            <div class="card-header">
                <h3 class="card-title">Add new Admin</h3>
            </div>
            <form action="" method="POST">
                {{ csrf_field() }}

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" required value="{{old('name', $currentRecord->name)}}" id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="text" class="form-control" name="slug" required value="{{old('slug', $currentRecord->slug)}}" id="exampleInputEmail1" placeholder="Slug Ex. URL">
                        <div style="color: red">{{$errors->first('slug')}}</div>                        
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
                        <input type="text" class="form-control" name="meta_title" required value="{{old('meta_title', $currentRecord->meta_title)}}" id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meta Description</label>
                        <textarea class="form-control" name="meta_description" required id="exampleInputEmail1">{{old('meta_description', $currentRecord->meta_description)}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keyword" required value="{{old('meta_keyword', $currentRecord->meta_keywords)}}" id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
