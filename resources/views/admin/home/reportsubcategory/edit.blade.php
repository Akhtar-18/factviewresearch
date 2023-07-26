@extends('layout')
@section('title','Report Sub Category Edit')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Report Sub Category Add</h6>
        <a href="{{ url('admin/reportsubcategory') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('admin/reportsubcategory/update')}}/{{$subcategory->id}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-2">Category Name <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id" required>
                                <option value=""> Select Category</option>
                                @foreach($categoryData as $list)
                                @if(isset($subcategory->category_id) && $subcategory->category_id==$list->id)
                                <option value="{{$list->id}}" selected> {{$list->cat_name}}</option>
                                @else
                                <option value="{{$list->id}}"> {{$list->cat_name}}</option>
                                @endif
                                @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-2">Sub Category Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter Category"
                                name="sub_category"
                                value="@if(isset($subcategory->sub_category)){{$subcategory->sub_category}}@endif"
                                required>
                                @if ($errors->has('sub_category'))
                                    <span class="text-danger">{{ $errors->first('sub_category') }}</span>
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
