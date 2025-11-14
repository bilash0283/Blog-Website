@extends('backend.layout.app')

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Category Manage</h6>
                    <a href="{{ route('add-category') }}" class="btn btn-primary btn-sm">Add Category</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categoris as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ Str::limit($category->description, 50, ' ...')   }}</td>
                                    <td><span
                                            class="btn btn-sm btn-{{$category->status == 'active' ? 'success' : 'danger' }}">{{ $category->status }}</span>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <a href="{{ route('edit-category', $category->id) }}"
                                                class="btn btn-sm btn-info">edit</a>
                                            <button class="btn btn-sm btn-danger"
                                                onClick="deleteCategory({{ $category->id }})">Delete</button>
                                            <form id="deleteConfirm-{{ $category->id }}" class="d-none" action="{{ route('delete-category',$category->id) }}" method="POST">
                                                @csrf
                                            </form>
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

    <script>


        const deleteCategory = (id) => {

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('deleteConfirm-'+id);
                    form.submit()
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
            
        }

    </script>
@endsection