@extends('layout')
@section('title','Testimonials Add')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Testimonials Add</h6>
        <a href="{{ url('admin/testimonials') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('admin/testimonials/submit')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-2">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter name"
                                name="name"
                                value="{{ old('name') }}"
                                required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-2">Profile <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter profile"
                                name="profile"
                                value="{{ old('profile') }}"
                                required>
                                @if ($errors->has('profile'))
                                    <span class="text-danger">{{ $errors->first('profile') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="mb-2">Comments</label>
                                <textarea class="form-control" rows="12" name="comments">{{ old('comments') }}</textarea>
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
