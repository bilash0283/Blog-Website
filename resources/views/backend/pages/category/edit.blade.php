@extends('backend.layout.app')

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
                    <a href="{{ route('category') }}" class="btn btn-primary btn-sm">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('update-category',$category->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="name" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Name" name="name" value="{{ $category->name }}" required>
                        </div>
                        <div class="form-group">
                            <textarea name="description" placeholder="Description" class="form-control form-control-user" id="" rows="5" required>{{ $category->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control form-control-user " id="" required>
                                <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <button class="btn btn-primary ">Update</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection