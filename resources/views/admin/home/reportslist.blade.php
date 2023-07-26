@extends('layout')
@section('title','Reports List')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Reports List</h6>
        @can('reports-create')
        <a href="{{ route('admin.reports.add') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New
            </span>
        </a>

        <a class="btn btn-info" href="{{ url('admin/reports/export') }}">Export User Data</a>
        @endcan
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr><th>Category Name</th>
                        <th>Heading </th>
                        <th>Url</th>
                        <th>Pages</th>
                        <th>Publish Month</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr><th>Category Name</th>
                        <th>Heading </th>
                        <th>Url</th>
                        <th>Pages</th>
                        <th>Publish Month</th>
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
        ajax: "{{ url('admin/reports/list') }}",
        columns: [
            {data: 'category_id', name: 'category_id'},
            {data: 'heading', name: 'heading'},
            {data: 'url', name: 'url'},
            {data: 'pages', name: 'pages'},
            {data: 'publish_month', name: 'publish_month'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });

  });
</script>
@endsection
