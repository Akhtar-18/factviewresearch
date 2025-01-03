@extends('layout')
@section('title','Audio & Video Add')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Audio & Video Add</h6>
        <a href="{{ url('admin/audio-video') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('admin/audio-video/submit')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-2">Audio <span class="text-danger">*</span></label>
                                <input type="file" class="form-control"
                                placeholde r="Enter Audio"
                                name="audio"
                                value="{{ old('audio') }}"
                                required>
                                @if ($errors->has('audio'))
                                    <span class="text-danger">{{ $errors->first('audio') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-2">Video <span class="text-danger">*</span></label>
                                <input type="file" class="form-control"
                                placeholde r="Enter Video"
                                name="video"
                                value="{{ old('video') }}"
                                required>
                                @if ($errors->has('video'))
                                    <span class="text-danger">{{ $errors->first('video') }}</span>
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
