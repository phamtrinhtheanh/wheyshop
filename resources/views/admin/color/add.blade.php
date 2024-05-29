@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="card card-primary m-2">
            <div class="card-header">
                <h3 class="card-title">Add new Color</h3>
            </div>
            <form action="" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" name="title" required value="{{old('title')}}" id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Code</label>
                        <input type="color" class="form-control" name="code" required value="{{old('code')}}" id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
