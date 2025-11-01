@extends('backend.layout.app')

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Post Add</h6>
                    <a href="{{ route('post') }}" class="btn btn-primary btn-sm">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('update-post',$post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="name" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Name" value="{{ $post->name }}" name="name">
                        </div>
                        <div class="form-group">
                            <textarea name="description" class="form-control form-control-user" id="" rows="5" placeholder="description">{{ $post->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control form-control-user " id="">
                                <option value="Active" {{ $post->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ $post->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <img src="{{ asset($post->post_img) }}" alt="" style="width:50px;height:50px;">
                        <div class="form-group">
                            <label for="post_img">Post Image</label>
                            <input type="file" class="form-control form-control-user" id="exampleInputEmail"
                                 name="post_img">
                        </div>

                        <div class="form-group">
                             <select name="category_id" class="form-control form-control-user " id="">
                                <option select disabled>Select Category</option>
                                @foreach ($categoris as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary ">Update</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection