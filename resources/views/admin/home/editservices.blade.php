@extends('layout')
@section('title','Services Edit')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Services Edit</h6>
        <a href="{{ url('admin/services') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('admin/services/update/')}}/{{ $service->id }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Heading <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter heading"
                                name="heading"
                                value="{{ $service->heading }}"
                                required>
                                @if ($errors->has('heading'))
                                    <span class="text-danger">{{ $errors->first('heading') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2">Content</label>
                                <textarea class="form-control" rows="12" name="content">{{ $service->content }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="text-danger">{{ $errors->first('content') }}</span>
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
