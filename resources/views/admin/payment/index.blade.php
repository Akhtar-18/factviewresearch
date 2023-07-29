@extends('layout')
@section('title','Payment List')
@section('page')
<div class="container-fluid">
    

<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
       Payment Details
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
                        <th>Company Name</th>
                        <th>Job Title</th>
                        <th>Country Name</th>
                        <th>State Name</th>
                        <th>City Name</th>
                        <th>Zip Code</th>
                        <th>Email</th>
                        <th>Lisence Amount</th>
                        <th>Contact No</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                       <th>Report Title </th>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Job Title</th>
                        <th>Country Name</th>
                        <th>State Name</th>
                        <th>City Name</th>
                        <th>Zip Code</th>
                        <th>Email</th>
                        <th>Lisence Amount</th>
                        <th>Contact No</th>
                        <th>Address</th>
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
        ajax: "{{ route('report.payment.list') }}",
        columns: [
            {data: 'report_id', name: 'report_id'},
            {data: 'name', name: 'name'},
            {data: 'company_name', name: 'company_name'},
            {data: 'job_title', name: 'job_title'},
            {data: 'country_name', name: 'country_name'},
            {data: 'state_name', name: 'state_name'},
            {data: 'city_name', name: 'city_name'},
            {data: 'zip_code', name: 'zip_code'},
            {data: 'email', name: 'email'},
            {data: 'contact', name: 'contact'},
            {data: 'lisence_amount', name: 'lisence_amount'},
            {data: 'address', name: 'address'},
            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
  });
</script>
@endsection