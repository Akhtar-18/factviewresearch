<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>


    <link href="{{ url('') }}/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href=https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ url('') }}/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="{{ url('') }}/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="https://cdn.tiny.cloud/1/f5jfryuw1ddshgifs9gj6b2znjaqh301w3te6fqu2a19jjp3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <style type="text/css">.tox .tox-statusbar__text-container {display:none !important;}</style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: "emoticons hr image link lists charmap table",
    toolbar: "bold italic underline | bullist numlist | alignleft aligncenter alignright alignjustify",
    menubar: false
});
</script>

<style>
.tox-notification {
    display:none !important;
}
.preview{
    width: 150px;
    margin-left: -35px;
    color: #fff;
    display: block;
    font-size: 14px;
    font-weight: 500;
    border-radius: 4px;
    text-align: center;
    background-color: #ff5f7c;
    cursor: pointer;
    border: none;
    padding: 7px;
    text-transform: uppercase;
    transition: .3s ease-in-out;

}
.mtl-5{
 margin: 5px;
}

</style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <!-- <img src="{{ url('') }}/admin/RMlogo.png" height="40"> -->
                    @if(getCompanyDetail())
                    <img src="{{asset('company_logo')}}/{{getCompanyDetail()->company_logo}}" width="150px" height="40">
                    @elseif(isset(getCompanyDetail()->company_name))
                    {{getCompanyDetail()->company_name}}
                    @endif
                </div>
                <!-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> -->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               CMS
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>CMS</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if(auth()->user()->can('slider-list'))
                        <a class="collapse-item" href="{{ url('admin/slider')}}">Slider</a>
                        @endif
                        @if(auth()->user()->can('aboutus-list'))
                        <a class="collapse-item" href="{{ url('admin/aboutus')}}">About Us</a>
                        @endif
                        @if(auth()->user()->can('services-list'))
                        <a class="collapse-item" href="{{ url('admin/services')}}">Services</a>
                        @endif
                        @if(auth()->user()->can('contactdetails-list'))
                        <a class="collapse-item" href="{{ url('admin/contactdetails')}}">Contact Details</a>
                        @endif
                        @if(auth()->user()->can('whowe-list'))
                        <a class="collapse-item" href="{{ url('admin/whowe')}}">Who We Are</a>
                        @endif
                        @if(auth()->user()->can('whychoose-list'))
                        <a class="collapse-item" href="{{ url('admin/whychoose')}}">Why Choose Us</a>
                        @endif
                        @if(auth()->user()->can('getintouch-list'))
                        <a class="collapse-item" href="{{ url('admin/getintouch')}}">Get In Touch With Us</a>
                        @endif
                        @if(auth()->user()->can('clients-list'))
                        <a class="collapse-item" href="{{ url('admin/clients')}}">Clients</a>
                        @endif
                        @if(auth()->user()->can('testimonials-list'))
                        <a class="collapse-item" href="{{ url('admin/testimonials')}}">Testimonials</a>
                        @endif
                        @if(auth()->user()->can('careers-list'))
                        <a class="collapse-item" href="{{ url('admin/careers')}}">Careers</a>
                        @endif
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Users</h6>
                        @if(auth()->user()->can('role-list'))
                        <a class="collapse-item" href="{{ route('roles.index') }}">User Roles/Types</a>
                        @endif
                        @if(auth()->user()->can('users-list'))
                        <a class="collapse-item" href="{{ route('users.index') }}">Users</a>
                        @endif
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Reports</h6>

                        <!-- @if(auth()->user()->can('reportcategory-list')) -->
                        <a class="collapse-item" href="{{ url('admin/reportcategory')}}">Report Category</a>
                        <!-- @endif -->
                        <a class="collapse-item" href="{{ route('report.subcategory.index')}}">Report Sub Category</a>
                        <!-- @if(auth()->user()->can('reports-list')) -->
                        <a class="collapse-item" href="{{ url('admin/reports')}}">Reports</a>
                        <!-- @endif -->
                        <a class="collapse-item" href="{{url('admin/reports/bulk-upload')}}">Bulk Upload</a>
                    </div>
                </div>
            </li>
            <!---- Enquiry------>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('admin/enquiry') }}">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Enquiries</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-table"></i>
                    <span>Lead</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Payment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Media/Insights</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Blog:</h6>
                        <!-- <a class="collapse-item" href="{{url('admin/blog-category')}}">Blogs Category</a> -->
                        <a class="collapse-item" href="{{url('admin/admin-blogs')}}">Blogs</a>
                        <a class="collapse-item" href="{{url('admin/admin-press-releases')}}">Press Releases</a>
                        <a class="collapse-item" href="{{url('admin/admin-case-studies')}}">Case Studies</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->

            <!-- Nav Item - Tables -->


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex"> -->
                <!-- <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="..."> -->
                <!-- <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a> -->
            <!-- </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </li>

                        <!-- Nav Item - Alerts -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i> -->
                                <!-- Counter - Alerts -->
                                <!-- <span class="badge badge-danger badge-counter">3+</span>
                            </a> -->
                            <!-- Dropdown - Alerts -->
                            <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li> -->

                        <!-- Nav Item - Messages -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i> -->
                                <!-- Counter - Messages -->
                                <!-- <span class="badge badge-danger badge-counter">7</span>
                            </a> -->
                            <!-- Dropdown - Messages -->
                            <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li> -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <!-- <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg"> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                @include('flash-message')
                <!-- Begin Page Content -->
                @yield('page')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <p class="mb-0">&copy; Copyright <span class="current-year"></span>. All Rights Reserved.</p>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('signOut') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('') }}/admin/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('') }}/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="{{ url('') }}/admin/endor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="{{ url('') }}/admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="{{ url('') }}/admin/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="{{ url('') }}/admin/js/demo/chart-area-demo.js"></script>
    <script src="{{ url('') }}/admin/js/demo/chart-pie-demo.js"></script> -->



     <!-- Page level plugins -->
     <script src="{{ url('') }}/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('') }}/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('') }}/admin/js/demo/datatables-demo.js"></script>

    <script>tinymce.init({selector:'textarea'});</script>
    <!-- <script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: "emoticons hr image link lists charmap table",
    toolbar: "bold italic underline | bullist numlist | alignleft aligncenter alignright alignjustify",
    menubar: false
});
</script> -->
<script>
    $(document).ready(function(){
   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
});
</script>

</body>

</html>
