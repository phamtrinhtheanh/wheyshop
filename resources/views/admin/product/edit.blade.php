@extends('admin.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/richeditor/summernote.min.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="card card-primary m-2">
            <div class="card-header">
                <h3 class="card-title">Edit a Product</h3>
            </div>
            <form action="" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" name="title" required
                                value="{{ old('title', $currentRecord->title) }}" id="exampleInputEmail1"
                                placeholder="Enter name">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Category</label>
                            <input type="text" class="form-control" name="category_id" required
                                value="{{ old('category_id', $currentRecord->category_id) }}" id="exampleInputEmail1"
                                placeholder="Enter name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">SubCategory</label>
                            <input type="text" class="form-control" name="subcategory_id" required
                                value="{{ old('category_id', $currentRecord->subcategory_id) }}" id="exampleInputEmail1"
                                placeholder="Enter name">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Brand</label>
                            <input type="text" class="form-control" name="brand_id" required
                                value="{{ old('brand', $currentRecord->brand_id) }}" id="exampleInputEmail1"
                                placeholder="Enter brand">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Old price</label>
                            <input type="text" class="form-control" name="old_price" required
                                value="{{ old('old_price', $currentRecord->old_price) }}" id="exampleInputEmail1"
                                placeholder="Enter name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control" name="price" required
                                value="{{ old('price', $currentRecord->price) }}" id="exampleInputEmail1"
                                placeholder="Enter name">
                        </div>
                    </div>
                    <label for="exampleInputEmail1">Short Description</label>
                    <textarea class="form-control" height="500" name="short_description" id="summernote" >
                        {{ old('short_description', $currentRecord->short_description) }}
                    </textarea>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/plugins/richeditor/summernote.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 150,
                disableResizeEditor: true
            });
        });
    </script>
    <style>
        .note-resizebar {
            display: none !important;
        }
    </style>
@endsection
