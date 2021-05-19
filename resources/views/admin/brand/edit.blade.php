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
        <div class="card-header">Edit Brand</div>
        <div class="card-body">
        <form action="{{ url('brand/update/'.$brands->id) }}" method="POST" enctype="multipart/form-data">@csrf
            <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Update Brand Name</label>
            <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brands->brand_name }}">
            @error('brand_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Update Brand Image</label>
            <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $brands->brand_image }}">
            @error('brand_image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Brand</button>
        </form>
        </div>
    </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Brand Image</div>
            <div class="card-body">
                <img src="{{ asset($brands->brand_image)}}" alt="" style="width: 100%;;">
            </div>
        </div>
    </div>
</div>
@endsection
