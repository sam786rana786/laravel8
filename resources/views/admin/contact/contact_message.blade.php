@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-md-12">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        @endif
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <div class="col-sm-8">
                    <h2>All about</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-5">
                    <table class="table nowrap" id="basic-data-table" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" width="5%">Sl No</th>
                                <th scope="col" width="15%">Name</th>
                                <th scope="col" width="15%">Email</th>
                                <th scope="col" width="15%">Contact No.</th>
                                <th scope="col" width="25%">Message</th>
                                <th scope="col" width="15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($contacts as $contact)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->contact }}</td>
                                <td>{{ $contact->message }}</td>
                                <td>
                                <a href="{{ url('contact/edit/'.$contact->id) }}" class="btn btn-info btn-default">Edit</a>
                                <a href="{{ url('contact/delete/'.$contact->id) }}" onclick="return confirm('Are you sure you want to delete this Contact Section')" class="btn btn-danger btn-default">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
