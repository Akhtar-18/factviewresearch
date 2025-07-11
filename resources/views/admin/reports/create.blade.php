@extends('layout')
@section('title', 'Report Add')
@section('page')
    <div class="container-fluid">


        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Report Add</h6>
                <a href="{{ url('admin/reports') }}">
                    <span class="btn btn-primary float-right">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                    </span>
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('admin/reports/submit') }}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-info card-tabs">
                                        <div class="card-header p-0 pt-1">
                                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                            <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-basic-tab" data-toggle="pill" href="#custom-tabs-one-basic" role="tab" aria-controls="custom-tabs-one-basic" aria-selected="true">Basic</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-content-tab" data-toggle="pill" href="#custom-tabs-one-content" role="tab" aria-controls="custom-tabs-one-content" aria-selected="false">Summary</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-summery-details-tab" data-toggle="pill" href="#custom-tabs-one-summery-details" role="tab" aria-controls="custom-tabs-one-summery-details" aria-selected="false">Summary Details</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-report-component-tab" data-toggle="pill" href="#custom-tabs-one-report-component" role="tab" aria-controls="custom-tabs-one-report-component" aria-selected="false">Report Components</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-toc-tab" data-toggle="pill" href="#custom-tabs-one-toc" role="tab" aria-controls="custom-tabs-one-toc" aria-selected="false">TOC</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-segmentation-tab" data-toggle="pill" href="#custom-tabs-one-segmentation" role="tab" aria-controls="custom-tabs-one-segmentation" aria-selected="false">Segmentation</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-methodology-tab" data-toggle="pill" href="#custom-tabs-one-methodology" role="tab" aria-controls="custom-tabs-one-methodology" aria-selected="false">Methodology</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-customization-tab" data-toggle="pill" href="#custom-tabs-one-customization" role="tab" aria-controls="custom-tabs-one-customization" aria-selected="false">Customized</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-faq-tab" data-toggle="pill" href="#custom-tabs-one-faq" role="tab" aria-controls="custom-tabs-one-faq" aria-selected="false">FAQ</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-seo-tab" data-toggle="pill" href="#custom-tabs-one-seo" role="tab" aria-controls="custom-tabs-one-seo" aria-selected="false">SEO</a>
                                            </li>
                                        </ul>
                                        </div>
                                        <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-one-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-one-basic" role="tabpanel" aria-labelledby="custom-tabs-one-basic-tab">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="mb-2">Category Name <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="category_id" id="category_id">
                                                                <option value=" ">Select Category</option>
                                                                @foreach ($category as $list)
                                                                    <option value="{{ $list->id }}">{{ $list->cat_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('category_id'))
                                                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="mb-2">Heading<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter heading"
                                                                name="heading" value="{{ old('heading') }}" id="heading" onkeyup="getSlug()"
                                                                required>
                                                            @if ($errors->has('heading'))
                                                                <span class="text-danger">{{ $errors->first('heading') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="mb-2">Url <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter Url" name="url"
                                                                id="slug" value="{{ old('url') }}" required>
                                                            @if ($errors->has('url'))
                                                                <span class="text-danger">{{ $errors->first('url') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="mb-2">Pages <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder="Enter Page" name="pages"
                                                                value="{{ old('pages') }}" required>
                                                            @if ($errors->has('pages'))
                                                                <span class="text-danger">{{ $errors->first('email_address') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="mb-2">Publish Month <span class="text-danger"></span></label>
                                                            <input type="date" class="form-control" placeholder="Enter Publish Month"
                                                                name="publish_month" value="{{ old('publish_month') }}">
                                                            @if ($errors->has('publish_month'))
                                                                <span class="text-danger">{{ $errors->first('publish_month') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="mb-2">Image <span class="text-danger"></span></label>
                                                            <input type="file" class="form-control" placeholder="Enter twitter"
                                                                name="image" value="{{ old('image') }}">
                                                            @if ($errors->has('image'))
                                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="mb-2">Image Alt<span class="text-danger"></span></label>
                                                            <input type="text" class="form-control" placeholder="Enter Image  Alt"
                                                                name="image_alt" value="{{ old('image_alt') }}">
                                                            @if ($errors->has('image_alt'))
                                                                <span class="text-danger">{{ $errors->first('image_alt') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                    <hr class="bg-info">
                                                    <h4>License Section</h4>
                                                    <hr class="bg-info">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="mb-2">Single User<span class="text-danger"></span></label>
                                                                <input type="text" class="form-control" placeholder="Enter Single User"
                                                                    name="single_user" value="{{ old('single_user') }}">
                                                                @if ($errors->has('single_user'))
                                                                    <span class="text-danger">{{ $errors->first('single_user') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="mb-2">Multi User<span class="text-danger"></span></label>
                                                                <input type="text" class="form-control" placeholder="Enter Multi User"
                                                                    name="multi_user" value="{{ old('multi_user') }}">
                                                                @if ($errors->has('multi_user'))
                                                                    <span class="text-danger">{{ $errors->first('multi_user') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="mb-2">Enterprise<span class="text-danger"></span></label>
                                                                <input type="text" class="form-control" placeholder="Enter Enterprise"
                                                                    name="enterprise_user" value="{{ old('enterprise_user') }}">
                                                                @if ($errors->has('enterprise_user'))
                                                                    <span class="text-danger">{{ $errors->first('enterprise_user') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="custom-tabs-one-content" role="tabpanel" aria-labelledby="custom-tabs-one-content-tab">
                                                <div class="col-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="mb-2">Summary/Description <span
                                                                class="text-danger"></span></label>
                                                        <textarea class="form-control" name="description" rows="20">{{ old('description') }}</textarea>
                                                        @if ($errors->has('description'))
                                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="tab-pane fade" id="custom-tabs-one-summery-details" role="tabpanel" aria-labelledby="custom-tabs-one-summery-details-tab">
                                                <div class="col-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label class="mb-2">Heading<span class="text-danger"></span></label>
                                                                <input type="text" name="summery_heading[]" class="form-control">
                                                                @if ($errors->has('summery_heading[]'))
                                                                    <span class="text-danger">{{ $errors->first('summery_heading[]') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label class="mb-2">Details<span class="text-danger"></span></label>
                                                                <textarea type="text" class="form-control" name="summery_details[]"></textarea>
                                                                @if ($errors->has('summery_details[]'))
                                                                    <span class="text-danger">{{ $errors->first('summery_details[]') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mt-3">
                                                            <a onclick="addmoresummarydetails()" class="btn btn-success mt-3"
                                                                style="width: 70px;"><i class="fa fa-plus-circle"></i></a>
                                                        </div>
                                                    </div>
                                                    <div id="rowsummery_details"></div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-report-component" role="tabpanel" aria-labelledby="custom-tabs-one-report-component-tab">
                                                <div class="col-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label class="mb-2">Heading<span class="text-danger"></span></label>
                                                                <input type="text" name="sheading[]" class="form-control">
                                                                @if ($errors->has('sheading[]'))
                                                                    <span class="text-danger">{{ $errors->first('sheading[]') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label class="mb-2">Details<span class="text-danger"></span></label>
                                                                <!-- <textarea type="text" class="form-control" name="sdetails[]"></textarea> -->
                                                                <input type="text" name="sdetails[]" class="form-control">
                                                                @if ($errors->has('sdetails[]'))
                                                                    <span class="text-danger">{{ $errors->first('sdetails[]') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mt-3">
                                                            <a onclick="addmoresummary()" class="btn btn-success mt-3"
                                                                style="width: 70px;"><i class="fa fa-plus-circle"></i></a>
                                                        </div>
                                                    </div>
                                                    <div id="rows"></div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-toc" role="tabpanel" aria-labelledby="custom-tabs-one-toc-tab">
                                                <div class="col-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="mb-2">Table of Contents <span class="text-danger"></span></label>
                                                        <textarea class="form-control" name="toc" rows="20">{{ old('toc') }}</textarea>
                                                        @if ($errors->has('toc'))
                                                            <span class="text-danger">{{ $errors->first('toc') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-segmentation" role="tabpanel" aria-labelledby="custom-tabs-one-segmentation-tab">
                                                <div class="form-group">
                                                    <label class="mb-2">Segmentation <span class="text-danger"></span></label>
                                                    <textarea class="form-control" name="segment" rows="12"></textarea>
                                                    @if ($errors->has('segment'))
                                                        <span class="text-danger">{{ $errors->first('segment') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-methodology" role="tabpanel" aria-labelledby="custom-tabs-one-methodology-tab">
                                                <div class="col-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="mb-2">Methodology <span class="text-danger"></span></label>
                                                        <textarea class="form-control" name="methodology" rows="12"></textarea>
                                                        @if ($errors->has('methodology'))
                                                            <span class="text-danger">{{ $errors->first('methodology') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-customization" role="tabpanel" aria-labelledby="custom-tabs-one-customization-tab">
                                                <div class="col-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="mb-2">Customized <span class="text-danger"></span></label>
                                                        <textarea class="form-control" name="customized" rows="12">{{ old('customized') }}</textarea>
                                                        @if ($errors->has('customized'))
                                                            <span class="text-danger">{{ $errors->first('customized') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-faq" role="tabpanel" aria-labelledby="custom-tabs-one-faq-tab">
                                                <div class="col-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label class="mb-2">Question<span class="text-danger"></span></label>
                                                                <textarea class="form-control" name="question[]">{{ old('question[]') }}</textarea>
                                                                @if ($errors->has('question[]'))
                                                                    <span class="text-danger">{{ $errors->first('question[]') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label class="mb-2">Answer<span class="text-danger"></span></label>
                                                                <textarea class="form-control" name="answer[]">{{ old('answer[]') }}</textarea>
                                                                @if ($errors->has('answer[]'))
                                                                    <span class="text-danger">{{ $errors->first('answer[]') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mt-3">
                                                            <a onclick="addmore()" class="btn btn-success mt-3" style="width: 70px;"><i
                                                                    class="fa fa-plus-circle"></i></a>
                                                        </div>
                                                    </div>
                                                    <div id="row"></div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-seo" role="tabpanel" aria-labelledby="custom-tabs-one-seo-tab">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="mb-2">Heading H1 <span class="text-danger"></span></label>
                                                        <input class="form-control" name="h1_column" value="{{ old('h1_column') }}" />
                                                        @if ($errors->has('h1_column'))
                                                            <span class="text-danger">{{ $errors->first('h1_column') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="mb-2">Schema <span class="text-danger"></span></label>
                                                        <input class="form-control" name="schema" value="{{ old('schema') }}" />
                                                        @if ($errors->has('schema'))
                                                            <span class="text-danger">{{ $errors->first('schema') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="mb-2">Meta Title <span class="text-danger"></span></label>
                                                        <input class="form-control" name="meta_title" value="{{ old('meta_title') }}" />
                                                        @if ($errors->has('meta_title'))
                                                            <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="mb-2">Meta Description <span class="text-danger"></span></label>
                                                        <input class="form-control" name="meta_des" value="{{ old('meta_des') }}" />
                                                        @if ($errors->has('meta_des'))
                                                            <span class="text-danger">{{ $errors->first('meta_des') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="mb-2">Meta Keywords <span class="text-danger"></span></label>
                                                        <input class="form-control" name="metal_keywords"
                                                            value="{{ old('metal_keywords') }}" />
                                                        @if ($errors->has('metal_keywords'))
                                                            <span class="text-danger">{{ $errors->first('metal_keywords') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body g-3 row">
                                            <div class="col-12" align="left">
                                                <div class="d-grid gap-2 with-100">
                                                <button class="btn btn-success"><i class="fa fa-save"></i> Save Report Details</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        var segmentCount = 1;

        function addrows() {
            //debugger;
            var new_item = '<div class="col-md-12 mt-3" id="main' + segmentCount +
                '"><div class="row">\
                <div class="form-group col-md-4">\
                  <label class="mb-2">Types<span class="text-danger"></span></label>\
                    <input type="text" class="form-control" name="segmenttypename[]" placeholder="Types">\
                </div>\
                <div class="form-group col-md-3" style="margin-top: 3%;">\
                  <a class="add btn btn-sm btn-success text-white" style="width: 70px;" onclick="addrows()"><i class="fa fa-plus-circle"></i></a>&nbsp;<a class="add btn btn-sm btn-danger text-white" onclick="removemain(' +
                segmentCount + ')" style="width: 70px;"><i class="fa fa-trash"></i></a>\
                </div>\
                <div class="col-md-12">\
                  <div class="table-responsive">\
                    <table class="table table-bordered" style="width: 100%;">\
                      <thead>\
                        <th>Action</th>\
                        <th>Sub Types</th>\
                        <th>Persentage</th>\
                      </thead>\
                      <tbody id="new_chq' + segmentCount + '">\
                        <tr>\
                          <td><a class="add btn btn-sm btn-success text-white"  onclick="add(' + segmentCount + ')" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>\
                          <input type="hidden" name="product_array_key[]" class="form-control" value="' + segmentCount + '">\
                          </td>\
                         <td>\
                           <input type="text" name="segmentname[]"  class="form-control" placeholder="Sub Type">\
                          </td>\
                          <td><input type="text" class="form-control" id="segmentvalue'+segmentCount+'" name="segmentvalue[]" placeholder="Percentage" value="" onkeyup=checkvalue("segmentvalue'+segmentCount+'")>\
                          <span class="text-danger" id="error_segmentvalue'+segmentCount+'"></span>\
                        </td>\
                        </tr>\
                      </tbody>\
                    </table>\
                  </div>\
                </div></div></div>';
            $('#appendrow').append(new_item);
            segmentCount++;
        }


        var loop_product = 0;

        function add(idss = '') {
            var pro = (idss) ? idss : 0;
            var new_input = '<tr id="rows' + loop_product + '">\
                          <td><a class="add btn btn-sm btn-success text-white" style="width: 70px;" onclick="add(' + idss +
                ')"><i class="fa fa-plus-circle"></i></a> &nbsp;<input type="hidden" name="product_array_key[]" class="form-control" value="' +
                pro + '">\
                  <a class="add btn btn-sm btn-danger text-white" onclick="removesub(' + loop_product + ')" style="width: 70px;"><i class="fa fa-trash"></i></a></td>\
                          <td>\
                           <input type="text" name="segmentname[]"  class="form-control" placeholder="Sub Type">\
                          </td>\
                          <td><input type="text" class="form-control" name="segmentvalue[]" placeholder="Percentage" value="" >\
                        </td>\
                        </tr>';
            if (idss) {
                $('#new_chq' + idss).append(new_input);
            } else {
                $('#new_chq').append(new_input);
            }

            loop_product++;
        }

        function removesub(ids) {
            $('#rows' + ids).remove();
        }

        function removemain(id) {
            $('#main' + id).remove();
        }
    </script>
    <script>
        var loopCount = 1;

        function addmore() {
            var new_item = '<div class="row" id="row' + loopCount + '">\
                    <div class="col-md-5">\
                        <div class="form-group">\
                                <label class="mb-2">Question<span class="text-danger"></span></label>\
                                <textarea class="form-control"  name="question[]"></textarea>\
                        </div>\
                    </div>\
                    <div class="col-md-5">\
                        <div class="form-group">\
                                <label class="mb-2">Answer<span class="text-danger"></span></label>\
                                <textarea class="form-control"  name="answer[]"></textarea>\
                        </div>\
                    </div>\
                    <div class="col-md-2 mt-3">\
                            <a onclick="addmore()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>&nbsp;\
                            <a onclick="remove(' + loopCount + ')" class="btn btn-danger mt-3" style="width: 70px;"><i class="fa fa-trash"></i></a>\
                    </div>\
                </div>';
            $('#row').append(new_item);
            loopCount++;
            tinymce.init({
                selector: 'textarea'
            });
        }

        function remove(ids) {
            $('#row' + ids).remove();
        }

        function getSlug() {
            let heading = $('#heading').val();

            $.ajax({
                type: "POST",
                url: "{{ url('admin/reports/getSlug') }}",
                data: {
                    heading: heading
                },
                success: function(data) {
                    $('#slug').val(data);
                },
                error: function(data) {
                    //console.log(data);
                }
            });
        }

        function getsubcategory() {
            let category_id = $('#category_id').val();

            $.ajax({
                type: "POST",
                url: "{{ url('admin/reportsubcategory/getSubCategory') }}",
                data: {
                    category_id: category_id
                },
                success: function(data) {
                    $('#sub_category_id').html(data);
                },
                error: function(data) {
                    //console.log(data);
                }
            });
        }

        var loopmarketvalueCount = 1;

        function addmarketvalue() {
            var new_item = '<div class="row" id="marketvaluerow' + loopmarketvalueCount + '">\
                    <div class="col-md-5">\
                        <div class="form-group">\
                            <label class="mb-2">Year<span class="text-danger"></span></label>\
                            <input type="text" class="form-control" name="marketyear[]" placeholder="Year">\
                        </div>\
                    </div>\
                    <div class="col-md-5">\
                        <div class="form-group">\
                            <label class="mb-2">Percentage<span class="text-danger"></span></label>\
                            <input type="text" class="form-control" id="marketvalue'+loopmarketvalueCount+'" name="marketvalue[]" placeholder="Percentage" onkeyup=checkvalue("marketvalue'+loopmarketvalueCount+'")>\
                            <span class="text-danger" id="error_marketvalue'+loopmarketvalueCount+'"></span>\
                        </div>\
                    </div>\
                    <div class="col-md-2 mt-3">\
                            <a onclick="addmarketvalue()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>&nbsp;\
                            <a onclick="removemarketvalue(' + loopmarketvalueCount + ')" class="btn btn-danger mt-3" style="width: 70px;"><i class="fa fa-trash"></i></a>\
                    </div>\
                </div>';
            $('#marketvalue').append(new_item);
            loopmarketvalueCount++;
        }

        function removemarketvalue(ids) {
            $('#marketvaluerow' + ids).remove();
        }


        var loopregionCount = 1;

        function addregion() {
            var new_itemr = '<div class="row" id="regionrow' + loopregionCount + '">\
                    <div class="col-md-5">\
                        <div class="form-group">\
                            <label class="mb-2">Region Name<span class="text-danger"></span></label>\
                            <input type="text" class="form-control" name="regionname[]" placeholder="Region Name">\
                        </div>\
                    </div>\
                    <div class="col-md-5">\
                        <div class="form-group">\
                            <label class="mb-2">Percentage<span class="text-danger"></span></label>\
                            <input type="text" class="form-control" name="regionvalue[]" id="regionvalue'+loopregionCount+'" placeholder="Region Percentage" onkeyup=checkvalue("regionvalue'+loopregionCount+'")>\
                        </div>\
                        <span class="text-danger" id="error_regionvalue'+loopregionCount+'"></span>\
                    </div>\
                    <div class="col-md-2 mt-3">\
                        <a onclick="addregion()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>&nbsp;\
                        <a onclick="removeregion(' + loopregionCount + ')" class="btn btn-danger mt-3" style="width: 70px;"><i class="fa fa-trash"></i></a>\
                    </div>\
                </div>';
            $('#regions').append(new_itemr);
            loopregionCount++;
        }

        function removeregion(ids) {
            $('#regionrow' + ids).remove();
        }

        var loopmarketshareCount = 1;

        function addmarketshare() {
            var new_items = '<div class="row" id="marketsharerow' + loopmarketshareCount + '">\
                     <div class="col-md-5">\
                            <div class="form-group">\
                                <label class="mb-2">Market<span class="text-danger"></span></label>\
                                <input type="text" class="form-control" name="marketsharename[]" placeholder="Market">\
                            </div>\
                        </div>\
                        <div class="col-md-5">\
                            <div class="form-group">\
                                <label class="mb-2">Percentage<span class="text-danger"></span></label>\
                                <input type="text" class="form-control" name="marketsharevalue[]" placeholder="Percentage">\
                            </div>\
                        </div>\
                    <div class="col-md-2 mt-3">\
                        <a onclick="addmarketshare()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>&nbsp;\
                        <a onclick="removemarketshare(' + loopmarketshareCount + ')" class="btn btn-danger mt-3" style="width: 70px;"><i class="fa fa-trash"></i></a>\
                    </div>\
                </div>';
            $('#marketshares').append(new_items);
            loopmarketshareCount++;
        }

        function removemarketshare(ids) {
            $('#marketsharerow' + ids).remove();
        }
    </script>
    <script>
        var loopCountSummary = 1;

        function addmoresummary() {
            var new_item = '<div class="row" id="rowsummary' + loopCountSummary + '">\
            <div class="col-md-5">\
                <div class="form-group">\
                        <label class="mb-2">Heading<span class="text-danger"></span></label>\
                        <input type="text" class="form-control"  name="sheading[]">\
                </div>\
            </div>\
            <div class="col-md-5">\
                <div class="form-group">\
                        <label class="mb-2">Details<span class="text-danger"></span></label>\
                        <input type="text" name="sdetails[]" class="form-control">\
                        <!-- <textarea type="text" class="form-control"  name="sdetails[]"></textarea> -->\
                </div>\
            </div>\
            <div class="col-md-2 mt-3">\
                    <a onclick="addmoresummary()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>&nbsp;\
                    <a onclick="removesummary(' + loopCountSummary + ')" class="btn btn-danger mt-3" style="width: 70px;"><i class="fa fa-trash"></i></a>\
            </div>\
        </div>';
            $('#rows').append(new_item);
            loopCountSummary++;
            tinymce.init({
                selector: 'textarea',
                plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars advcode fullscreen image link media template codesample table charmap powerpaste hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
                imagetools_cors_hosts: ['picsum.photos'],
                menubar: 'file edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline strikethrough | styleselect | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl | link image code ',
                toolbar_sticky: true,
                powerpaste_allow_local_images: true,
                powerpaste_word_import: 'prompt',
                powerpaste_html_import: 'prompt',
                autosave_ask_before_unload: true,
                autosave_interval: '30s',
                autosave_prefix: '{path}{query}-{id}-',
                autosave_restore_when_empty: false,
                autosave_retention: '2m',
                image_advtab: true,
                importcss_append: true,
                /* enable title field in the Image dialog*/
                image_title: true,
                /* enable automatic uploads of images represented by blob or data URIs*/
                automatic_uploads: true,
                /*
                  URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                  images_upload_url: 'postAcceptor.php',
                  here we add custom filepicker only to Image dialog
                */
                file_picker_types: 'image',
                /* and here's our custom image picker*/
                file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    /*
                      Note: In modern browsers input[type="file"] is functional without
                      even adding it to the DOM, but that might not be the case in some older
                      or quirky browsers like IE, so you might want to add it to the DOM
                      just in case, and visually hide it. And do not forget do remove it
                      once you do not need it anymore.
                    */

                    input.onchange = function() {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.onload = function() {
                            /*
                              Note: Now we need to register the blob in TinyMCEs image blob
                              registry. In the next release this part hopefully won't be
                              necessary, as we are looking to handle it internally.
                            */
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            /* call the callback and populate the Title field with the file name */
                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        };
                        reader.readAsDataURL(file);
                    };

                    input.click();
                },
                height: 200,
                image_caption: true,
                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                noneditable_noneditable_class: 'mceNonEditable',
                toolbar_mode: 'sliding',
                contextmenu: 'link image imagetools table',
                //content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });
        }

        function removesummary(ids) {
            $('#rowsummary' + ids).remove();
        }



            function checkvalue(id){
                var inputValue = $('#'+id).val();
                var html='';
                if (!validateDecimal(inputValue)) {
                    $('#'+id).val(html);
                    $('#error_'+id).text('Allow Only Number and decimal');
                }
                else
                {

                    $('#error_'+id).text(html);
                }
            }

            function validateDecimal(inputValue) {
                var numberPattern = /^-?\d+(\.\d*)?$/;
                return numberPattern.test(inputValue);
            }

    </script>


<script>
        var loopCountSummaryDetails = 1;

        function addmoresummarydetails() {
            var new_item_details = '<div class="row" id="rowsummarydetails' + loopCountSummaryDetails + '">\
            <div class="col-md-5">\
                <div class="form-group">\
                        <label class="mb-2">Heading<span class="text-danger"></span></label>\
                        <input type="text" class="form-control"  name="summery_heading[]">\
                </div>\
            </div>\
            <div class="col-md-5">\
                <div class="form-group">\
                        <label class="mb-2">Details<span class="text-danger"></span></label>\
                        <textarea type="text" class="form-control"  name="summery_details[]"></textarea>\
                </div>\
            </div>\
            <div class="col-md-2 mt-3">\
                    <a onclick="addmoresummarydetails()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>&nbsp;\
                    <a onclick="removesummarydetails(' + loopCountSummaryDetails + ')" class="btn btn-danger mt-3" style="width: 70px;"><i class="fa fa-trash"></i></a>\
            </div>\
        </div>';
            $('#rowsummery_details').append(new_item_details);
            loopCountSummaryDetails++;
            tinymce.init({
                selector: 'textarea',
                plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars advcode fullscreen image link media template codesample table charmap powerpaste hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
                imagetools_cors_hosts: ['picsum.photos'],
                menubar: 'file edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline strikethrough | styleselect | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl | link image code ',
                toolbar_sticky: true,
                powerpaste_allow_local_images: true,
                powerpaste_word_import: 'prompt',
                powerpaste_html_import: 'prompt',
                autosave_ask_before_unload: true,
                autosave_interval: '30s',
                autosave_prefix: '{path}{query}-{id}-',
                autosave_restore_when_empty: false,
                autosave_retention: '2m',
                image_advtab: true,
                importcss_append: true,
                /* enable title field in the Image dialog*/
                image_title: true,
                /* enable automatic uploads of images represented by blob or data URIs*/
                automatic_uploads: true,
                /*
                  URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                  images_upload_url: 'postAcceptor.php',
                  here we add custom filepicker only to Image dialog
                */
                file_picker_types: 'image',
                /* and here's our custom image picker*/
                file_picker_callback: function(cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    /*
                      Note: In modern browsers input[type="file"] is functional without
                      even adding it to the DOM, but that might not be the case in some older
                      or quirky browsers like IE, so you might want to add it to the DOM
                      just in case, and visually hide it. And do not forget do remove it
                      once you do not need it anymore.
                    */

                    input.onchange = function() {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.onload = function() {
                            /*
                              Note: Now we need to register the blob in TinyMCEs image blob
                              registry. In the next release this part hopefully won't be
                              necessary, as we are looking to handle it internally.
                            */
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            /* call the callback and populate the Title field with the file name */
                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        };
                        reader.readAsDataURL(file);
                    };

                    input.click();
                },
                height: 200,
                image_caption: true,
                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                noneditable_noneditable_class: 'mceNonEditable',
                toolbar_mode: 'sliding',
                contextmenu: 'link image imagetools table',
                //content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });
        }

         function removesummarydetails(ids) {
            $('#rowsummarydetails' + ids).remove();
        }
        </script>
@endsection
