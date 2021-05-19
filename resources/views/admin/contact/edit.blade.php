@extends('admin.admin_master')
@section('admin')
<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Add Contact</h2>
        </div>
        <div class="card-body">
            <div class="mb-5">
                <form action="{{ url('/contact/update/'.$contacts->id) }}" method="POST">@csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Contact Email</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" aria-describedby="emailHelp" placeholder="Contact email" value="{{ $contacts->email }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Contact Number</label>
                        <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" aria-describedby="emailHelp" placeholder="Contact Title" value="{{ $contacts->phone }}">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Contact Address</label>
                        <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $contacts->address }}</textarea>
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
@endsection
