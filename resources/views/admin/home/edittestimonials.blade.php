@extends('layout')
@section('title','Testimonials Edit')
@section('page')
<div class="container-fluid">


<!-- Page name -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Testimonials Edit</h6>
        <a href="{{ url('admin/testimonials') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ secure_url('admin/testimonials/update/')}}/{{ $testimonial->id }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter name"
                                name="name"
                                value="{{ $testimonial->name }}"
                                required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">profile <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="profile"
                                placeholder="Enter profile"
                                profile="profile"
                                value="{{ $testimonial->profile }}"
                                required>
                                @if ($errors->has('profile'))
                                    <span class="text-danger">{{ $errors->first('profile') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Client Image (@if(isset($testimonial->client_image)){{$testimonial->client_image}}@endif)</label>
                                <input type="text" class="form-control"
                                placeholder="Enter Client image url"
                                name="client_image"
                                value="{{$testimonial->client_image}}"
                                >
                                @if ($errors->has('client_image'))
                                    <span class="text-danger">{{ $errors->first('client_image') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2">Content</label>
                                <textarea class="form-control" rows="12" name="comments">{{ $testimonial->comments }}</textarea>
                                @if ($errors->has('comments'))
                                    <span class="text-danger">{{ $errors->first('comments') }}</span>
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
