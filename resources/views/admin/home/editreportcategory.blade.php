@extends('layout')
@section('title','Report Category Edit')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Report Category Edit</h6>
        <a href="{{ url('admin/reportcategory') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('admin/reportcategory/update/')}}/{{ $category->id }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Category Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter Category"
                                name="cat_name"
                                value="{{ $category->cat_name }}"
                                required>
                                @if ($errors->has('cat_name'))
                                    <span class="text-danger">{{ $errors->first('cat_name') }}</span>
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
