@extends('layout')
@section('title', 'Reports List')
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

                    <a class="btn btn-info" href="{{ url('admin/reports/export') }}">Export Reports Data</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Heading </th>
                                <th>Url</th>
                                <th>Pages</th>
                                <th>Publish Month</th>
                                <th>Status</th>
                                <th style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Category Name</th>
                                <th>Heading </th>
                                <th>Url</th>
                                <th>Pages</th>
                                <th>Publish Month</th>
                                <th>Status</th>
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
                ajax: "{{ secure_url('admin/reports/list') }}",
                columns: [{
                        data: 'category_id',
                        name: 'category_id'
                    },
                    {
                        data: 'heading',
                        name: 'heading'
                    },
                    {
                        data: 'url',
                        name: 'url'
                    },
                    {
                        data: 'pages',
                        name: 'pages'
                    },
                    {
                        data: 'publish_month',
                        name: 'publish_month'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

        });

        /*********change status**********/
        $("body").on("click", '.changeStatusCustom', function(event) {
            dataString = {
                "id": $(this).data('id'),
                "status": $(this).data('status')
            };
            var UrlValue = $(this).data('url');
            var status = $(this).data('status');
            var changeStatus = $(this);
            var btn = $(this);

            Swal.fire({
                title: 'Are you sure you want to change status?',
                icon: 'warning',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: UrlValue,
                        method: 'post',
                        data: dataString,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function(xhr) {
                            // xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
                        },
                        success: function(response) {
                            if (response.success) {
                                // var ErroMsg = $(this).printErrorMsg(response.message);
                                // $(this).Toastshow('success',response.message);

                                window.location.reload();
                            } else {
                                // var ErroMsg = $(this).printErrorMsg(response.message);
                                if (ErroMsg === '') {
                                    ErroMsg = "Something went wrong!";
                                }
                                // $(this).Toastshow('error',ErroMsg);

                                if (status == 1) {
                                    window.location.reload();
                                } else {
                                    window.location.reload();
                                }
                            }
                        },
                        error: function(data) {
                            console.log("error ", data);

                            if (status == 1) {
                                window.location.reload();
                            } else {
                                window.location.reload();
                            }
                        }
                    });
                } else if (result.isDenied) {
                    $('#search').trigger('change');
                }
                //return false;
            });
            //return false;
        });
    </script>
@endsection
