@extends('layout')
@section('title','Enquiry List')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active mtl-5" id="nav-enquiry-tab" data-toggle="tab" data-target="#nav-enquiry" type="button" role="tab" aria-controls="nav-enquiry" aria-selected="true">Report Enquiry</button>
    <button class="nav-link mtl-5" id="nav-request-tab" data-toggle="tab" data-target="#nav-request" type="button" role="tab" aria-controls="nav-request" aria-selected="false">Report Request</button>
    <button class="nav-link mtl-5" id="nav-discount-tab" data-toggle="tab" data-target="#nav-discount" type="button" role="tab" aria-controls="nav-discount" aria-selected="false">Report Discount</button>
    <button class="nav-link mtl-5" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact Enquiry</button>
  </div>
    </div>
    <div class="card-body">
    <!-- <nav>

</nav> -->
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-enquiry" role="tabpanel" aria-labelledby="nav-enquiry-tab">
    <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Report Title </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Contact No</th>
                        <th>Organization</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                       <th>Report Title </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Contact No</th>
                        <th>Organization</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
  </div>
  <div class="tab-pane fade" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab">
      <div class="table-responsive">
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Report Title </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Contact No</th>
                        <th>Organization</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                        <th>Report Title </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Contact No</th>
                        <th>Organization</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
  </div>
  <div class="tab-pane fade" id="nav-discount" role="tabpanel" aria-labelledby="nav-discount-tab">
      <div class="table-responsive">
            <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Report Title </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Contact No</th>
                        <th>Organization</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Report Title </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Contact No</th>
                        <th>Organization</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
  </div>

  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
      <div class="table-responsive">
            <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
  </div>
</div>
    </div>
</div>

</div>
<script type="text/javascript">
 $(document).ready(function() {
    var table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ secure_url('admin/enquiry/list') }}",
        columns: [
            {data: 'report_id', name: 'report_id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'country', name: 'country'},
            {data: 'contact_no', name: 'contact_no'},
            {data: 'organizations', name: 'organizations'},
            {data: 'others', name: 'others'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

  });
</script>

<script type="text/javascript">
 $(document).ready(function() {
    var table = $('#dataTable2').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ secure_url('admin/enquiry/request') }}",
        columns: [
            {data: 'report_id', name: 'report_id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'country', name: 'country'},
            {data: 'contact_no', name: 'contact_no'},
            {data: 'organizations', name: 'organizations'},
            {data: 'others', name: 'others'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

  });
</script>

<script type="text/javascript">
 $(document).ready(function() {
    var table = $('#dataTable3').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ secure_url('admin/enquiry/discount') }}",
        columns: [
            {data: 'report_id', name: 'report_id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'country', name: 'country'},
            {data: 'contact_no', name: 'contact_no'},
            {data: 'organizations', name: 'organizations'},
            {data: 'others', name: 'others'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

  });
</script>

<script type="text/javascript">
 $(document).ready(function() {
    var table = $('#dataTable4').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ secure_url('admin/enquiry/contact') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'contact_no', name: 'contact_no'},
            {data: 'subject', name: 'subject'},
            {data: 'msg', name: 'msg'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

  });
</script>
@endsection
