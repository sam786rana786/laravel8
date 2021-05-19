@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-md-8">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        @endif
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>All Brands</h2>
            </div>
            <div class="card-body">
                <div class="mb-5">
                    <table class="table nowrap" id="basic-data-table" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sl No</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                                <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                <td>{{ $brand->brand_name }}</td>
                                <td> <img src="{{ asset($brand->brand_image)}}" alt="" style="height: 40px; width:70px;"> </td>
                                <td>
                                @if($brand->created_at == NULL)
                                <span class="text-danger">No Date Set</span>
                                @else
                                {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                                @endif
                                </td>
                                <td>
                                <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info btn-default">Edit</a>
                                <a href="{{ url('brand/delete/'.$brand->id) }}" onclick="return confirm('Are you sure you want to delete this Brand')" class="btn btn-danger btn-default">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $brands->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Brand</h2>
            </div>
            <div class="card-body">
                <div class="mb-5">
                    <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Brand Name</label>
                            <input type="text" name="brand_name" class="form-control" id="exampleFormControlInput1" aria-describedby="emailHelp" placeholder="Brand Name">
                            @error('brand_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Brand Image</label>
                            <input type="file" name="brand_image" class="form-control-file" id="exampleFormControlFile1">
                            @error('brand_image')
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
</div>
@endsection
