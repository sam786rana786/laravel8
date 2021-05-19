@extends('admin.admin_master')
@section('admin')
<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Add Service</h2>
        </div>
        <div class="card-body">
            <div class="mb-5">
                <form action="{{ url('/service/update/'.$services->id) }}" method="POST">@csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">service Title</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" aria-describedby="emailHelp" placeholder="Service Title" value="{{ $services->title }}">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Service Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $services->description }}</textarea>
                        @error('description')
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
