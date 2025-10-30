@extends('backend.layout.app')

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Category Add</h6>
                    <a href="{{ route('category') }}" class="btn btn-primary btn-sm">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('store-category') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="name" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Name" name="name" required>
                        </div>
                        <div class="form-group">
                            <textarea name="description" placeholder="Description" class="form-control form-control-user" id="" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control form-control-user " id="" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button class="btn btn-primary ">Add</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection