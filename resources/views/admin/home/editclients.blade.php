@extends('layout')
@section('title','Client Edit')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Client Edit</h6>
        <a href="{{ url('admin/clients') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ secure_url('admin/clients/update/')}}/{{ $clients->id }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter Name"
                                name="name"
                                value="{{ $clients->name }}"
                                required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Image <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="image" placeholder="Enter Image Url" value="{{ $clients->image }}">
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
