@extends('layout')
@section('title','Press Releases Edit')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Press Releases Edit</h6>
        <a href="{{ url('admin/admin-press-releases') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('admin/admin-press-releases/update')}}/{{$blog->id}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="mb-2">Heading<span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter heading"
                                name="heading"
                                value="@if(isset($blog->heading)){{$blog->heading}}@endif"
                                id="heading"
                                onkeyup="getSlug()"
                                required>
                                @if ($errors->has('heading'))
                                    <span class="text-danger">{{ $errors->first('heading') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="mb-2">Url <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter Url"
                                name="url"
                                id="slug"
                                value="@if(isset($blog->url)){{$blog->url}}@endif"
                                required>
                                @if ($errors->has('url'))
                                    <span class="text-danger">{{ $errors->first('url') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="mb-2">Image <span class="text-danger"></span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter Image Url"
                                name="image"
                                value="{{ $blog->image }}"
                                >
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="mb-2">Image  Alt<span class="text-danger"></span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter Image  Alt"
                                name="image_alt"
                                value="@if(isset($blog->image_alt)){{$blog->image_alt}}@endif"
                                >
                                @if ($errors->has('image_alt'))
                                    <span class="text-danger">{{ $errors->first('image_alt') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2">Summary/Description <span class="text-danger"></span></label>
                                <textarea class="form-control"  name="description">@if(isset($blog->description)){{$blog->description}}@endif</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-12">
                            <hr class="bg-info">
                            <p><b> SEO Section</b></p>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-2">Schema <span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="schema" value="{{ $blog->schema??'' }}">
                                @if ($errors->has('schema'))
                                    <span class="text-danger">{{ $errors->first('schema') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-2">Meta Title <span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="meta_title" value="{{ $blog->meta_title??'' }}">
                                @if ($errors->has('meta_title'))
                                    <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-2">Meta Description <span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="meta_des" value="{{ $blog->meta_des??'' }}">
                                @if ($errors->has('meta_des'))
                                    <span class="text-danger">{{ $errors->first('meta_des') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-2">Meta Keywords <span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="metal_keywords" value="{{ $blog->metal_keywords??'' }}">
                                @if ($errors->has('metal_keywords'))
                                    <span class="text-danger">{{ $errors->first('metal_keywords') }}</span>
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

<script>


function getSlug()
    {
        let heading=$('#heading').val();

        $.ajax({
            type: "POST",
            url: "{{ url('admin/reports/getSlug') }}",
            data: {heading:heading},
            success: function (data) {
                $('#slug').val(data);
            },
            error: function (data) {
                //console.log(data);
            }
        });
    }




</script>
@endsection
