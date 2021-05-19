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
                                <th scope="col" width="5%">Sl No</th>
                                <th scope="col" width="15%">Contact Email</th>
                                <th scope="col" width="10%">Contact Number</th>
                                <th scope="col" width="25%">Contact Address</th>
                                <th scope="col" width="15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($contacts as $contact)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->address }}</td>
                                <td>
                                <a href="{{ url('contact/edit/'.$contact->id) }}" class="btn btn-info btn-default">Edit</a>
                                <a href="{{ url('contact/delete/'.$contact->id) }}" onclick="return confirm('Are you sure you want to delete this Contact')" class="btn btn-danger btn-default">Delete</a>
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
                    <form action="{{ route('store.contact') }}" method="POST">@csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Contact Email</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" aria-describedby="emailHelp" placeholder="Service Title">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Contact Number</label>
                            <input type="phone" name="phone" class="form-control" id="exampleFormControlInput1" aria-describedby="emailHelp" placeholder="Service Title">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Address</label>
                            <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('address')
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
