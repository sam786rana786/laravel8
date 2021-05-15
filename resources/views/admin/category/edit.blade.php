<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
              @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">Edit Category</div>
                  <div class="card-body">
                    <form action="{{ url('category/update',$categories->id) }}" method="POST">@csrf
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Update Category Name</label>
                        <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $categories->category_name }}">
                        @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>                      
                      <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
