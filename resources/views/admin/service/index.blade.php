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
                <h2>All Services</h2>
            </div>
            <div class="card-body">
                <div class="mb-5">
                    <table class="table nowrap" id="basic-data-table" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="width: 10%">Sl No</th>
                                <th scope="col" style="width: 15%">Title</th>
                                <th scope="col" style="width: 25%">Description</th>
                                <th scope="col" style="width:25%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($services as $service)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->description }}</td>
                                <td>
                                <a href="{{ url('service/edit/'.$service->id) }}" class="btn btn-info btn-default">Edit</a>
                                <a href="{{ url('service/delete/'.$service->id) }}" onclick="return confirm('Are you sure you want to delete this Service')" class="btn btn-danger btn-default">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Service</h2>
            </div>
            <div class="card-body">
                <div class="mb-5">
                    <form action="{{ route('store.service') }}" method="POST">@csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">service Title</label>
                            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" aria-describedby="emailHelp" placeholder="Service Title">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Service Description</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
</div>
@endsection
