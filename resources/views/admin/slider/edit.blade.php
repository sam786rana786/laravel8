@extends('admin.admin_master')
@section('admin')
<div class="row">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Slider</div>
            <div class="card-body">
                <form action="{{ url('slider/update/'.$sliders->id) }}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="old_image" value="{{ $sliders->image }}">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Slider Title</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                            aria-describedby="emailHelp" placeholder="Title"  value="{{ $sliders->title }}"1>
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Slider Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                            rows="3">{{ $sliders->description }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1"  value="{{ $sliders->image }}">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Slider</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Brand Image</div>
            <div class="card-body">
                <img src="{{ asset($sliders->image)}}" alt="" style="width: 100%;;">
            </div>
        </div>
    </div>
</div>
@endsection
