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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="mb-2">Category Name <span class="text-danger">*</span></label>
                                        <select class="form-control" name="category_id" id="category_id"
                                            >
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
                                <!-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="mb-2">Sub Category Name <span class="text-danger">*</span></label>
                                        <select class="form-control" name="sub_category_id" id="sub_category_id">
                                            <option value=" ">Select Sub Category</option>

                                        </select>
                                        @if ($errors->has('sub_category_id'))
                                            <span class="text-danger">{{ $errors->first('sub_category_id') }}</span>
                                        @endif
                                    </div>
                                </div> -->
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




                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Summary/Description <span
                                                class="text-danger"></span></label>
                                        <textarea class="form-control" name="description" rows="20">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Table of Contents <span class="text-danger"></span></label>
                                        <textarea class="form-control"  name="toc" rows="20">{{ old('toc') }}</textarea>
                                        @if ($errors->has('toc'))
                                            <span class="text-danger">{{ $errors->first('toc') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Segmentation <span class="text-danger"></span></label>
                                        <textarea class="form-control"  name="segment" rows="12"></textarea>
                                        @if ($errors->has('segment'))
                                            <span class="text-danger">{{ $errors->first('segment') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Methodology <span class="text-danger"></span></label>
                                        <textarea class="form-control"  name="methodology" rows="12"></textarea>
                                        @if ($errors->has('methodology'))
                                            <span class="text-danger">{{ $errors->first('methodology') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <hr class="bg-info">
                                    <p><b>License Types</b></p>
                                </div>

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


                                <div class="col-md-12">
                                    <hr class="bg-info">
                                    <p><b>FAQ Section</b></p>
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

                                <div class="col-md-12">
                                    <hr class="bg-info">
                                    <p class="h5"><b>Graphical Section</b></p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><b>CAGR Graph</b></p>
                                        </div>
                                        <br>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-2">CAGR<span class="text-danger"></span></label>
                                                <input type="text" class="form-control" name="cagr"
                                                    placeholder="cagr">
                                            </div>
                                        </div>
                                    </div>
                                    <p><b>Market Value Current and Forecast</b> <a onclick="addmarketvalue()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a></p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-2">Year<span class="text-danger"></span></label>
                                                <input type="text" class="form-control" name="marketyear[]"
                                                    placeholder="Year">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                                <input type="text" class="form-control" name="marketvalue[]"
                                                    placeholder="Percentage">
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="marketvalue">
                                            
                                        </div>
                                    </div>

                                    <p><b>Segment Graphs</b>  
                                        
                                    </p>
                                    <div class="row border">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="mb-2">Types<span class="text-danger"></span></label>
                                                <input type="text" class="form-control" name="segmenttypename[]"
                                                    placeholder="Types">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <a onclick="addrows()" style="width: 70px;" class="btn btn-success text-white mt-2"><i class="fa fa-plus-circle"></i></a>
                                        </div>
                                        <div class="col-md-12">
                                      <div class="table-responsive">
                                        <table class="table table-bordered" style="width: 100%;">
                                          <thead>
                                            <th>Action</th>
                                            <th>Sub Type</th>
                                            <th>Percentage</th>
                                          </thead>
                                          <tbody id="new_chq">
                                            <tr>
                                              <td><a class="add btn btn-sm btn-success text-white"  onclick="add()" style="width: 70px;"><i class='fa fa-plus-circle'></i></a>
                                                <input type="hidden" name="product_array_key[]" class="form-control" value="0">
                                              </td>
                                              <td> 
                                               <input type="text" name="segmentname[]"  class="form-control" placeholder="Sub Type">
                                              </td>
                                              <td><input type="text" class="form-control" name="segmentvalue[]" placeholder="Percentage" value="">
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    </div>
                                    <div class="form-group row border" id="appendrow"></div>
                                    <p><b> Region Wise Graphs</b> <a onclick="addregion()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a></p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-2">Region Name<span class="text-danger"></span></label>
                                                <input type="text" class="form-control" name="regionname[]"
                                                    placeholder="Region Name" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                                <input type="text" class="form-control" name="regionvalue[]"
                                                    placeholder="Region Percentage">
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="regions"></div>
                                </div>


                                    <p><b>Market Share Graphs</b> <a onclick="addmarketshare()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a></p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-2">Market<span class="text-danger"></span></label>
                                                <input type="text" class="form-control" name="marketsharename[]"
                                                    placeholder="Market">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                                <input type="text" class="form-control" name="marketsharevalue[]"
                                                    placeholder="Percentage">
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="marketshares"></div>
                                    </div>
                                    
                                    

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Customized <span class="text-danger"></span></label>
                                        <textarea class="form-control" name="customized" rows="12">{{ old('customized') }}</textarea>
                                        @if ($errors->has('customized'))
                                            <span class="text-danger">{{ $errors->first('customized') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <hr class="bg-info">
                                    <p><b> SEO Section</b></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Schema <span class="text-danger"></span></label>
                                        <textarea class="form-control" name="schema" rows="12">{{ old('schema') }}</textarea>
                                        @if ($errors->has('schema'))
                                            <span class="text-danger">{{ $errors->first('schema') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Meta Title <span class="text-danger"></span></label>
                                        <textarea class="form-control" name="meta_title" rows="12">{{ old('meta_title') }}</textarea>
                                        @if ($errors->has('meta_title'))
                                            <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Meta Description <span class="text-danger"></span></label>
                                        <textarea class="form-control" name="meta_des" rows="12">{{ old('meta_des') }}</textarea>
                                        @if ($errors->has('meta_des'))
                                            <span class="text-danger">{{ $errors->first('meta_des') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Meta Keywords <span class="text-danger"></span></label>
                                        <textarea class="form-control" name="metal_keywords" rows="12">{{ old('metal_keywords') }}</textarea>
                                        @if ($errors->has('metal_keywords'))
                                            <span class="text-danger">{{ $errors->first('metal_keywords') }}</span>
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
<script>
    var segementCount = 1;
  function addrows()
  {
    //debugger;
    var new_item='<div class="col-md-12 mt-3" id="main'+segementCount+'"><div class="row">\
    <div class="form-group col-md-4">\
      <label class="mb-2">Types<span class="text-danger"></span></label>\
        <input type="text" class="form-control" name="segmenttypename[]" placeholder="Types">\
    </div>\
    <div class="form-group col-md-3" style="margin-top: 3%;">\
      <a class="add btn btn-sm btn-success text-white" style="width: 70px;" onclick="addrows()"><i class="fa fa-plus-circle"></i></a>&nbsp;<a class="add btn btn-sm btn-danger text-white" onclick="removemain('+segementCount+')" style="width: 70px;"><i class="fa fa-trash"></i></a>\
    </div>\
    <div class="col-md-12">\
      <div class="table-responsive">\
        <table class="table table-bordered" style="width: 100%;">\
          <thead>\
            <th>Action</th>\
            <th>Sub Types</th>\
            <th>Persentage</th>\
          </thead>\
          <tbody id="new_chq'+segementCount+'">\
            <tr>\
              <td><a class="add btn btn-sm btn-success text-white"  onclick="add('+segementCount+')" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>\
              <input type="hidden" name="product_array_key[]" class="form-control" value="'+segementCount+'">\
              </td>\
             <td>\
               <input type="text" name="segmentname[]"  class="form-control" placeholder="Sub Type">\
              </td>\
              <td><input type="text" class="form-control" name="segmentvalue[]" placeholder="Percentage" value="">\
            </td>\
            </tr>\
          </tbody>\
        </table>\
      </div>\
    </div></div></div>';
    $('#appendrow').append(new_item);
segementCount++;
}


  var loop_product=0;
function add(idss='') 
{
  var pro=(idss)?idss:0;
var new_input = '<tr id="rows'+loop_product+'">\
              <td><a class="add btn btn-sm btn-success text-white" style="width: 70px;" onclick="add('+idss+')"><i class="fa fa-plus-circle"></i></a> &nbsp;<input type="hidden" name="product_array_key[]" class="form-control" value="'+pro+'">\
      <a class="add btn btn-sm btn-danger text-white" onclick="removesub('+loop_product+')" style="width: 70px;"><i class="fa fa-trash"></i></a></td>\
              <td>\
               <input type="text" name="segmentname[]"  class="form-control" placeholder="Sub Type">\
              </td>\
              <td><input type="text" class="form-control" name="segmentvalue[]" placeholder="Percentage" value="">\
            </td>\
            </tr>';
            if(idss)
            {
              $('#new_chq'+idss).append(new_input);
            }
            else
            {
              $('#new_chq').append(new_input);
            }

            loop_product++;
}
function removesub(ids) {
$('#rows' + ids).remove();
}
function removemain(id) {
  $('#main'+id).remove();
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
                <input type="text" class="form-control" name="marketvalue[]" placeholder="Percentage">\
            </div>\
        </div>\
        <div class="col-md-2 mt-3">\
                <a onclick="addmarketvalue()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>&nbsp;\
                <a onclick="removemarketvalue('+loopmarketvalueCount+')" class="btn btn-danger mt-3" style="width: 70px;"><i class="fa fa-trash"></i></a>\
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
                <input type="text" class="form-control" name="regionvalue[]" placeholder="Region Percentage">\
            </div>\
        </div>\
        <div class="col-md-2 mt-3">\
            <a onclick="addregion()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>&nbsp;\
            <a onclick="removeregion('+loopregionCount+')" class="btn btn-danger mt-3" style="width: 70px;"><i class="fa fa-trash"></i></a>\
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
            <a onclick="removemarketshare('+loopmarketshareCount+')" class="btn btn-danger mt-3" style="width: 70px;"><i class="fa fa-trash"></i></a>\
        </div>\
    </div>';
            $('#marketshares').append(new_items);
            loopmarketshareCount++;
        }
        function removemarketshare(ids) {
            $('#marketsharerow' + ids).remove();
        }


         
    </script>
@endsection
