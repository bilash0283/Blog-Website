@extends('backend.layout.app')

@section('content')
   <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Post Manage</h6>
                        <a href="{{ route('add-post') }}" class="btn btn-primary btn-sm">Add Post</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td><img src="{{ $post->post_img }}" alt="" style="width:50px;height:50px;border-radius:50%;"></td>
                                        <td>{{ $post->name }}</td>
                                        <td>{{ Str::limit( $post->description,40) }}</td>
                                        <td>{{$post->status}}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>
                                            <div class="form-group">
                                                <a href="{{ route('edit-post',$post->id) }}" class="btn btn-sm btn-info">edit</a>
                                                <button id="delete"187 class="btn btn-sm btn-danger">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
@endsection