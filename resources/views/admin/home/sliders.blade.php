@extends('layout')
@section('title','Slider List')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Slider List</h6>
        <a href="{{ route('admin.slider.add') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Heading </th>
                        <th>Sub Heading</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Heading </th>
                        <th>Sub Heading</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

</div>
<script type="text/javascript">
 $(document).ready(function() {
    var table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/slider/list') }}",
        columns: [
            {data: 'heading', name: 'heading'},
            {data: 'subheading', name: 'subheading'},
            {data: 'content', name: 'content'},
            {data: 'slider_images', name: 'slider_images'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

  });
</script>
@endsection
