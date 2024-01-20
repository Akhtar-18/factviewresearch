@extends('layout')
@section('title','Report Sub  Category Add')
@section('page')
<div class="container-fluid">


<!    -- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Report Sub Category Add</h6>
        <a href="{{ url('admin/reportcategory') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ secure_url('admin/reportsubcategory/submit')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-2">Category Name <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id" required>
                                <option value=""> Select Category</option>
                                @foreach($categoryData as $list)
                                <option value="{{$list->id}}"> {{$list->cat_name}}</option>
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
                                placeholde r="Enter Category"
                                name="sub_category"
                                value="{{ old('sub_category') }}"
                                required>
                                @if ($errors->has('sub_category'))
                                    <span class="text-danger">{{ $errors->first('sub_category') }}</span>
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
