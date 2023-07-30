@extends('layout')
@section('title','Report Edit')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Report Edit</h6>
        <a href="{{ url('admin/reports') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('admin/reports/update')}}/{{$report->id}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="mb-2">Category Name <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value=" ">Select Category</option>
                                    @foreach($category as $list)
                                    @if(isset($report->category_id) && $report->category_id==$list->id)
                                    <option value="{{$list->id}}" selected>{{$list->cat_name}}</option>
                                    @else
                                    <option value="{{$list->id}}">{{$list->cat_name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="mb-2">Sub Category Name <span class="text-danger">*</span></label>
                                <input type="hidden" id="subcategory_id" value="@if(isset($report->sub_category_id)){{$report->sub_category_id}}@endif">
                                <select class="form-control" name="sub_category_id" id="sub_category_id">
                                    <option value=" ">Select Sub Category</option>

                                </select>
                                @if ($errors->has('sub_category_id'))
                                    <span class="text-danger">{{ $errors->first('sub_category_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="mb-2">Heading<span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter heading"
                                name="heading"
                                value="@if(isset($report->heading)){{$report->heading}}@endif"
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
                                value="@if(isset($report->url)){{$report->url}}@endif"
                                required>
                                @if ($errors->has('url'))
                                    <span class="text-danger">{{ $errors->first('url') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="mb-2">Pages <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter Page"
                                name="pages"
                                value="@if(isset($report->pages)){{$report->pages}}@endif"
                                required>
                                @if ($errors->has('pages'))
                                    <span class="text-danger">{{ $errors->first('email_address') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="mb-2">Publish Month <span class="text-danger"></span></label>
                                <input type="date" class="form-control"
                                placeholder="Enter Publish Month"
                                name="publish_month"
                                value="@if(isset($report->publish_month)){{date('Y-m-d',strtotime($report->publish_month))}}@endif"
                                >
                                @if ($errors->has('publish_month'))
                                    <span class="text-danger">{{ $errors->first('publish_month') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="mb-2">Image <span class="text-danger"></span></label>
                                <input type="file" class="form-control"
                                placeholder="Enter twitter"
                                name="image"
                                value="{{ old('image') }}"
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
                                value="@if(isset($report->image_alt)){{$report->image_alt}}@endif"
                                >
                                @if ($errors->has('image_alt'))
                                    <span class="text-danger">{{ $errors->first('image_alt') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2">Customized <span class="text-danger"></span></label>
                                <textarea class="form-control"  name="customized" rows="12">@if(isset($report->customized)){{$report->customized}}@endif</textarea>
                                @if ($errors->has('customized'))
                                    <span class="text-danger">{{ $errors->first('customized') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2">Summary/Description <span class="text-danger"></span></label>
                                <textarea class="form-control"  name="description" rows="12">@if(isset($report->description)){{$report->description}}@endif</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2">Table of Contents <span class="text-danger"></span></label>
                                <textarea class="form-control"  name="toc" rows="12">@if(isset($report->toc)){{$report->toc}}@endif</textarea>
                                @if ($errors->has('toc'))
                                    <span class="text-danger">{{ $errors->first('toc') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2">Segmentation <span class="text-danger"></span></label>
                                <textarea class="form-control"  name="segment" rows="12">@if(isset($report->segment)){{$report->segment}}@endif</textarea>
                                @if ($errors->has('segment'))
                                    <span class="text-danger">{{ $errors->first('segment') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2">Methodology <span class="text-danger"></span></label>
                                <textarea class="form-control"  name="methodology" rows="12">@if(isset($report->methodology)){{$report->methodology}}@endif</textarea>
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
                                <input type="hidden" name="license_id"
                                value="@if(isset($report->getReportLicenses->id)){{$report->getReportLicenses->id}}@endif">
                                <input type="text" class="form-control"
                                placeholder="Enter Single User"
                                name="single_user"
                                value="@if(isset($report->getReportLicenses->single_user)){{$report->getReportLicenses->single_user}}@endif"
                                >
                                @if ($errors->has('single_user'))
                                    <span class="text-danger">{{ $errors->first('single_user') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Multi User<span class="text-danger"></span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter Multi User"
                                name="multi_user"
                                value="@if(isset($report->getReportLicenses->multi_user)){{$report->getReportLicenses->multi_user}}@endif"
                                >
                                @if ($errors->has('multi_user'))
                                    <span class="text-danger">{{ $errors->first('multi_user') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Enterprise<span class="text-danger"></span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter Enterprise"
                                name="enterprise_user"
                                value="@if(isset($report->getReportLicenses->enterprise_user)){{$report->getReportLicenses->enterprise_user}}@endif"
                                >
                                @if ($errors->has('enterprise_user'))
                                    <span class="text-danger">{{ $errors->first('enterprise_user') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <hr class="bg-info">
                            <p><b>FAQ Section</b> <a onclick="addmore()" class="btn btn-success btn-sm mt-3"><i class="fa fa-plus"></i></a></p>
                            @foreach($report->getReportFaq as $key=>$list)
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="mb-2">Question<span class="text-danger"></span></label>
                                        <input type="hidden" name="faq_id[]" value="@if(isset($list->id)){{$list->id}}@endif">
                                        <textarea class="form-control"  name="question[]">@if(isset($list->question)){{$list->question}}@endif</textarea>
                                        @if ($errors->has('question[]'))
                                            <span class="text-danger">{{ $errors->first('question[]') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="mb-2">Answer<span class="text-danger"></span></label>
                                        <textarea class="form-control"  name="answer[]">@if(isset($list->answer)){{$list->answer}}@endif</textarea>
                                        @if ($errors->has('answer[]'))
                                            <span class="text-danger">{{ $errors->first('answer[]') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <a onclick="addmore()" class="btn btn-success btn-sm mt-3"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            @endforeach
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
                                        <input type="hidden" name="cagr_id" value="@if(isset($report->getReportCAGR->id)){{$report->getReportCAGR->id}}@endif">
                                        <input type="text" class="form-control" name="cagr"
                                        placeholder="CAGR" value="@if(isset($report->getReportCAGR->cagr)){{$report->getReportCAGR->cagr}}@endif">
                                    </div>
                                </div>
                            </div>
                            <p><b>Market Value Current and Forecast</b></p>
                            @if(count($report->getReportmarketgraph)>0)
                            @foreach($report->getReportmarketgraph as $keys =>$row)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Year<span class="text-danger"></span></label>
                                        <input type="hidden" name="market_id[]" value="@if(isset($row->id)){{$row->id}}@endif">
                                        <input type="text" class="form-control" name="marketyear[]" placeholder="Year"
                                        value="@if(isset($row->marketyear)){{$row->marketyear}}@endif">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketvalue[]" placeholder="Percentage"
                                        value="@if(isset($row->marketvalue)){{$row->marketvalue}}@endif">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="hidden" name="market_id[]" value="">
                                        <label class="mb-2">Year<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketyear[]" placeholder="Year">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketvalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div><div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="hidden" name="market_id[]" value="">
                                        <label class="mb-2">Year<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketyear[]" placeholder="Year">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketvalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="hidden" name="market_id[]" value="">
                                        <label class="mb-2">Year<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketyear[]" placeholder="Year">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketvalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="hidden" name="market_id[]" value="">
                                        <label class="mb-2">Year<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketyear[]" placeholder="Year">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketvalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Year<span class="text-danger"></span></label>
                                        <input type="hidden" name="market_id[]" value="">
                                        <input type="text" class="form-control" name="marketyear[]" placeholder="Year">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketvalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div>
                            @endif

                            <p><b>Segment Graphs</b></p>
                            @if(count($report->getReportSegmentgraph)>0)
                            @foreach($report->getReportSegmentgraph as $kess=>$res)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Types<span class="text-danger"></span></label>
                                        <input type="hidden" name="segment_id[]" value="@if(isset($res->id)){{$res->id}}@endif">
                                        <input type="text" class="form-control" name="segmentname[]" placeholder="Types"
                                        value="@if(isset($res->segmentname)){{$res->segmentname}}@endif">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="segmentvalue[]" placeholder="Percentage"
                                        value="@if(isset($res->segmentvalue)){{$res->segmentvalue}}@endif">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="hidden" name="segment_id[]" value="">
                                        <label class="mb-2">Types<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="segmentname[]" placeholder="Types">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="segmentvalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div><div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="hidden" name="segment_id[]" value="">
                                        <label class="mb-2">Types<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="segmentname[]" placeholder="Types">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="segmentvalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="hidden" name="segment_id[]" value="">
                                        <label class="mb-2">Types<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="segmentname[]" placeholder="Types">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="segmentvalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="hidden" name="segment_id[]" value="">
                                        <label class="mb-2">Types<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="segmentname[]" placeholder="Types">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="segmentvalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="hidden" name="segment_id[]" value="">
                                        <label class="mb-2">Types<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="segmentname[]" placeholder="Types">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="segmentvalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div>
                            @endif
                            <p><b> Region Wise Graphs</b></p>
                            @if(count($report->getReportRegiongraph)>0)
                            @foreach($report->getReportRegiongraph as $keyse=>$region)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Region Name<span class="text-danger"></span></label>
                                        <input type="hidden" name="region_id[]" value="@if(isset($region->id)){{$region->id}}@endif">
                                        <input type="text" class="form-control" name="regionname[]" placeholder="country Name" readonly
                                        value="@if(isset($region->regionname)){{$region->regionname}}@endif">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="regionvalue[]" placeholder="Region Percentage"
                                        value="@if(isset($region->regionvalue)){{$region->regionvalue}}@endif">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Region Name<span class="text-danger"></span></label>
                                        <input type="hidden" name="region_id[]" value="">
                                        <input type="text" class="form-control" name="regionname[]" placeholder="country Name" value="Africa" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="regionvalue[]" placeholder="Region Percentage">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Region Name<span class="text-danger"></span></label>
                                        <input type="hidden" name="region_id[]" value="">
                                        <input type="text" class="form-control" name="regionname[]" placeholder="country Name" value="Asia" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="regionvalue[]" placeholder="Region Percentage">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Region Name<span class="text-danger"></span></label>
                                        <input type="hidden" name="region_id[]" value="">
                                        <input type="text" class="form-control" name="regionname[]" placeholder="country Name" value="Caribbean" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="regionvalue[]" placeholder="Region Percentage">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Region Name<span class="text-danger"></span></label>
                                        <input type="hidden" name="region_id[]" value="">
                                        <input type="text" class="form-control" name="regionname[]" placeholder="country Name" value="Central America" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="regionvalue[]" placeholder="Region Percentage">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Region Name<span class="text-danger"></span></label>
                                        <input type="hidden" name="region_id[]" value="">
                                        <input type="text" class="form-control" name="regionname[]" placeholder="country Name" value="Europe" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="regionvalue[]" placeholder="Region Percentage">
                                    </div>
                                </div>

                            </div>
                            @endif

                            <p><b>Market Share Graphs</b></p>
                            @if(count($report->getReportmarketsharegraph)>0)
                            @foreach($report->getReportmarketsharegraph as $keyss=>$res)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="marketshare_id[]" value="@if(isset($res->id)){{$res->id}}@endif">
                                        <label class="mb-2">Market<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketsharename[]" placeholder="Market"
                                        value="@if(isset($res->marketsharename)){{$res->marketsharename}}@endif">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketsharevalue[]" placeholder="Percentage"
                                        value="@if(isset($res->marketsharevalue)){{$res->marketsharevalue}}@endif">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Market<span class="text-danger"></span></label>
                                        <input type="hidden" name="marketshare_id[]" value="">
                                        <input type="text" class="form-control" name="marketsharename[]" placeholder="Market">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketsharevalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Market<span class="text-danger"></span></label>
                                        <input type="hidden" name="marketshare_id[]" value="">
                                        <input type="text" class="form-control" name="marketsharename[]" placeholder="Market">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketsharevalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Market<span class="text-danger"></span></label>
                                        <input type="hidden" name="marketshare_id[]" value="">
                                        <input type="text" class="form-control" name="marketsharename[]" placeholder="Market">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketsharevalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Market<span class="text-danger"></span></label>
                                        <input type="hidden" name="marketshare_id[]" value="">
                                        <input type="text" class="form-control" name="marketsharename[]" placeholder="Market">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketsharevalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Market<span class="text-danger"></span></label>
                                        <input type="hidden" name="marketshare_id[]" value="">
                                        <input type="text" class="form-control" name="marketsharename[]" placeholder="Market">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="marketsharevalue[]" placeholder="Percentage">
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>

                       

                        <div class="col-md-12">
                            <hr class="bg-info">
                            <p><b> SEO Section</b></p>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2">Schema <span class="text-danger"></span></label>
                                <textarea class="form-control"  name="schema" rows="12">@if(isset($report->schema)){{$report->schema}}@endif</textarea>
                                @if ($errors->has('schema'))
                                    <span class="text-danger">{{ $errors->first('schema') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2">Meta Title <span class="text-danger"></span></label>
                                <textarea class="form-control"  name="meta_title" rows="12">@if(isset($report->meta_title)){{$report->meta_title}}@endif</textarea>
                                @if ($errors->has('meta_title'))
                                    <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2">Meta Description <span class="text-danger"></span></label>
                                <textarea class="form-control"  name="meta_des" rows="12">@if(isset($report->meta_des)){{$report->meta_des}}@endif</textarea>
                                @if ($errors->has('meta_des'))
                                    <span class="text-danger">{{ $errors->first('meta_des') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-2">Meta Keywords <span class="text-danger"></span></label>
                                <textarea class="form-control"  name="metal_keywords" rows="12">@if(isset($report->metal_keywords)){{$report->metal_keywords}}@endif</textarea>
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
    var loopCount=1;
    function addmore()
    {
        var new_item='<div class="row" id="row'+loopCount+'">\
    <div class="col-md-5">\
        <div class="form-group">\
                <label class="mb-2">Question<span class="text-danger"></span></label>\
                <input type="hidden" name="faq_id[]" value="">\
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
            <a onclick="addmore()" class="btn btn-success btn-sm mt-3"><i class="fa fa-plus"></i></a>&nbsp;\
            <a onclick="remove('+loopCount+')" class="btn btn-danger btn-sm mt-3"><i class="fa fa-trash"></i></a>\
    </div>\
</div>';
$('#row').append(new_item);
        loopCount++;
        tinymce.init({selector:'textarea'});
    }

    function remove(ids) {
$('#row' + ids).remove();
}

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

    $(document).ready(function(){
   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        getsubcategory();

    });
    function getsubcategory()
    {
        let category_id=$('#category_id').val();
        let subcategoryid=$('#subcategory_id').val();

        $.ajax({
            type: "POST",
            url: "{{ url('admin/reportsubcategory/getSubCategory') }}",
            data: {category_id:category_id,subcategoryid:subcategoryid},
            success: function (data) {
                $('#sub_category_id').html(data);
            },
            error: function (data) {
                //console.log(data);
            }
        });
    }

</script>
@endsection
