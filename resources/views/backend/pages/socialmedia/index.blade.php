@extends('backend.layout.app')

@section('content')
   <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-info">Post Manage</h6>
                        <a href="{{ route('Social-Media.create') }}" class="btn btn-info btn-sm">Add Social Media</a>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($socials as $social)
                                <tr>
                                    <td><img src="{{ asset($social->icon) }}" alt=""></td>
                                    <td>{{ $social->title }}</td>
                                    <td>{{ $social->link }}</td>
                                    <td>{{ $social->status }}</td>
                                    <td>edit</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


<script>
    const deletePost = (id) => {
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