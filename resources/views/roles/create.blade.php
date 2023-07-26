@extends('layout')
@section('title','Roles Permission Add')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Roles Permission Add</h6>
        <a href="{{ route('users.index') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('roles.store')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-2">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter Name"
                                name="name"
                                value="{{ old('name') }}"
                                required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                    <div class="accordion row" id="accordionExample">
                        <div class="col-md-6">
                        <div class="card">
                            <div class="card-header" id="sliders">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               Sliders
                                </button>
                            </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="sliders" data-parent="#accordionExample">
                            <div class="card-body">
                            @foreach(nameByPermisson('Slider') as $permission)
                                      <div class="col-xl-6 col-md-6 col-12 float-left mb-2">
                                          <input type="checkbox"  name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='admin'> {{ $permission->name }}
                                      </div>
                            @endforeach
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="card">
                            <div class="card-header" id="headingaboutud">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseAbout" aria-expanded="false" aria-controls="collapseAbout">
                               About
                                </button>
                            </h5>
                            </div>
                            <div id="collapseAbout" class="collapse" aria-labelledby="headingaboutud" data-parent="#accordionExample">
                            <div class="card-body">
                                 @foreach(nameByPermisson('Aboutus') as $permission)
                                      <div class="col-xl-6 col-md-6 col-12 float-left mb-2">
                                          <input type="checkbox"  name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='admin'> {{ $permission->name }}
                                      </div>
                                @endforeach
                            </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-header" id="headingServices">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseServices" aria-expanded="false" aria-controls="collapseServices">
                                            Services
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseServices" class="collapse" aria-labelledby="headingServices" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach(nameByPermisson('Services') as $permission)
                                        <div class="col-xl-6 col-md-6 col-12 float-left mb-2">
                                            <input type="checkbox"  name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='admin'> {{ $permission->name }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-header" id="headingWhychoose">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseWhychoose" aria-expanded="false" aria-controls="collapseWhychoose">
                                            Why Choose
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseWhychoose" class="collapse" aria-labelledby="headingWhychoose" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach(nameByPermisson('Whychoose') as $permission)
                                        <div class="col-xl-6 col-md-6 col-12 float-left mb-2">
                                            <input type="checkbox"  name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='admin'> {{ $permission->name }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-header" id="headingRoles">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseRoles" aria-expanded="false" aria-controls="collapseRoles">
                                            Roles
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseRoles" class="collapse" aria-labelledby="headingRoles" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach(nameByPermisson('Role') as $permission)
                                        <div class="col-xl-6 col-md-6 col-12 float-left mb-2">
                                            <input type="checkbox"  name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='admin'> {{ $permission->name }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-header" id="headingContactdetails">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseContactdetails" aria-expanded="false" aria-controls="collapseContactdetails">
                                            Contact Details
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseContactdetails" class="collapse" aria-labelledby="headingContactdetails" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach(nameByPermisson('Contactdetails') as $permission)
                                        <div class="col-xl-6 col-md-6 col-12 float-left mb-2">
                                            <input type="checkbox"  name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='admin'> {{ $permission->name }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-header" id="headingGetintouch">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseGetintouch" aria-expanded="false" aria-controls="collapseGetintouch">
                                            Get In Touch
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseGetintouch" class="collapse" aria-labelledby="headingGetintouch" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach(nameByPermisson('Getintouch') as $permission)
                                        <div class="col-xl-6 col-md-6 col-12 float-left mb-2">
                                            <input type="checkbox"  name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='admin'> {{ $permission->name }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-header" id="headingClients">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseClients" aria-expanded="false" aria-controls="collapseClients">
                                            Clients
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseClients" class="collapse" aria-labelledby="headingClients" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach(nameByPermisson('Clients') as $permission)
                                        <div class="col-xl-6 col-md-6 col-12 float-left mb-2">
                                            <input type="checkbox"  name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='admin'> {{ $permission->name }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-header" id="headingTestimonials">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTestimonials" aria-expanded="false" aria-controls="collapseTestimonials">
                                            Testimonials
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTestimonials" class="collapse" aria-labelledby="headingTestimonials" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach(nameByPermisson('Testimonials') as $permission)
                                        <div class="col-xl-6 col-md-6 col-12 float-left mb-2">
                                            <input type="checkbox"  name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='admin'> {{ $permission->name }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-header" id="headingCareers">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseCareers" aria-expanded="false" aria-controls="collapseCareers">
                                            Careers
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseCareers" class="collapse" aria-labelledby="headingCareers" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach(nameByPermisson('Careers') as $permission)
                                        <div class="col-xl-6 col-md-6 col-12 float-left mb-2">
                                            <input type="checkbox"  name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='admin'> {{ $permission->name }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-header" id="headingUsers">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                                            Users
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach(nameByPermisson('Users') as $permission)
                                        <div class="col-xl-6 col-md-6 col-12 float-left mb-2">
                                            <input type="checkbox"  name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='admin'> {{ $permission->name }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
