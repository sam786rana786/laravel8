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
                    <h2>All Sliders</h2>
                </div>
                <div class="text-right col-sm-4">
                    <a href="{{ route('add.slider') }}">
                        <button type="button" class="btn btn-primary">+ Add Slider</button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-5">
                    <table class="table nowrap" id="basic-data-table" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" width="5%">Sl No</th>
                                <th scope="col" width="15%">Slider Title</th>
                                <th scope="col" width="25%">Slider Description</th>
                                <th scope="col" width="15%">Image</th>
                                <th scope="col" width="15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                            <tr>
                                <th scope="row">{{ $sliders->firstItem()+$loop->index }}</th>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td> <img src="{{ asset($slider->image)}}" alt="" style="height: 40px; width:70px;"> </td>
                                <td>
                                <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info btn-default">Edit</a>
                                <a href="{{ url('slider/delete/'.$slider->id) }}" onclick="return confirm('Are you sure you want to delete this Slider')" class="btn btn-danger btn-default">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $sliders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

