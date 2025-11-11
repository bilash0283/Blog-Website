@extends('backend.layout.app')

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-info">Add Social Media</h6>
                    <a href="{{ route('Social-Media.index') }}" class="btn btn-info btn-sm">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('Social-Media.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="name" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Name" name="title">
                        </div>
                        <div class="form-group">
                            <input type="url" name="link" class="form-control form-control-user" placeholder="Social Media URL">
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control form-control-user " id="">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_img">Social Media Icon</label>
                            <input type="file" class="form-control form-control-user" id="exampleInputEmail"
                                 name="icon">
                        </div>

                        <button type="submit" class="btn btn-info ">Add</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection