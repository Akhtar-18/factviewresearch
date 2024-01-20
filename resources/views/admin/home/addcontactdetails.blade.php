@extends('layout')
@section('title','Contact Details Add')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Contact Details Add</h6>
        <a href="{{ url('admin/contactdetails') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ secure_url('admin/contactdetails/submit')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Company Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter Company Name"
                                name="company_name"
                                value="{{ old('company_name') }}"
                                required>
                                @if ($errors->has('company_name'))
                                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Company Logo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter Company logo Url"
                                name="company_logo"
                                value="{{ old('company_logo') }}"
                                required>
                                @if ($errors->has('company_logo'))
                                    <span class="text-danger">{{ $errors->first('company_logo') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter address"
                                name="address"
                                value="{{ old('address') }}"
                                required>
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                        <label class="mb-2">Contact No <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <input type="text" name="no_prefix" class="form-control" placeholder="+91" required>
                                @if ($errors->has('no_prefix'))
                                    <span class="text-danger">{{ $errors->first('no_prefix') }}</span>
                                @endif
                                </div>
                                <input type="number" class="form-control"
                                placeholder="Enter Contact No"
                                name="contact_no"
                                value="{{ old('contact_no') }}"
                                required>
                                @if ($errors->has('contact_no'))
                                    <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control"
                                placeholder="Enter Email Address"
                                name="email_address"
                                value="{{ old('email_address') }}"
                                required>
                                @if ($errors->has('email_address'))
                                    <span class="text-danger">{{ $errors->first('email_address') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Facebook <span class="text-danger"></span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter facebook"
                                name="facebook"
                                value="{{ old('facebook') }}"
                                >
                                @if ($errors->has('facebook'))
                                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Twitter <span class="text-danger"></span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter twitter"
                                name="twitter"
                                value="{{ old('twitter') }}"
                                >
                                @if ($errors->has('twitter'))
                                    <span class="text-danger">{{ $errors->first('twitter') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Instagram <span class="text-danger"></span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter instagram"
                                name="instagram"
                                value="{{ old('instagram') }}"
                                >
                                @if ($errors->has('instagram'))
                                    <span class="text-danger">{{ $errors->first('instagram') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Linkedin <span class="text-danger"></span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter linkedin"
                                name="linkedin"
                                value="{{ old('linkedin') }}"
                                >
                                @if ($errors->has('linkedin'))
                                    <span class="text-danger">{{ $errors->first('linkedin') }}</span>
                                @endif
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
