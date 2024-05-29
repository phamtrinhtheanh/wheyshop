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
                        <input type="text" class="form-control" name="name" required value="{{old('name')}}" id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" name="email" required value="{{old('email')}}" id="exampleInputPassword1" placeholder="Enter email">
                        <div style="color: red">{{$errors->first('email')}}</div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="0">Active</option>
                            <option value="1">InActive</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
