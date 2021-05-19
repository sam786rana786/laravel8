@extends('admin.admin_master')
@section('admin')
<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Add Slider</h2>
        </div>
        <div class="card-body">
            <div class="mb-5">
                <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Slider Title</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" aria-describedby="emailHelp" placeholder="Title">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Slider Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
