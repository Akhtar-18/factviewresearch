@extends('layout')
@section('title', 'Report Edit')
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
                    <form action="{{ url('admin/reports/update') }}/{{ $report->id }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="mb-2">Category Name <span class="text-danger">*</span></label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value=" ">Select Category</option>
                                        @foreach ($category as $list)
                                        @if (isset($report->category_id) && $report->category_id == $list->id)
                                        <option value="{{ $list->id }}" selected>{{ $list->cat_name }}
                                        </option>
                                        @else
                                        <option value="{{ $list->id }}">{{ $list->cat_name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="mb-2">Sub Category Name <span class="text-danger">*</span></label>
                                        <input type="hidden" id="subcategory_id"
                                            value="@if (isset($report->sub_category_id)) {{ $report->sub_category_id }} @endif">
                            <select class="form-control" name="sub_category_id" id="sub_category_id">
                                <option value=" ">Select Sub Category</option>

                            </select>
                            @if ($errors->has('sub_category_id'))
                            <span class="text-danger">{{ $errors->first('sub_category_id') }}</span>
                            @endif
                        </div>
                </div>
                --}}
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="mb-2">Heading<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter heading" name="heading" value="@if (isset($report->heading)) {{ $report->heading }} @endif" id="heading" onkeyup="getSlug()" required>
                        @if ($errors->has('heading'))
                        <span class="text-danger">{{ $errors->first('heading') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="mb-2">Url <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Url" name="url" id="slug" value="@if (isset($report->url)) {{ $report->url }} @endif" required>
                        @if ($errors->has('url'))
                        <span class="text-danger">{{ $errors->first('url') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="mb-2">Pages <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Page" name="pages" value="@if (isset($report->pages)) {{ $report->pages }} @endif" required>
                        @if ($errors->has('pages'))
                        <span class="text-danger">{{ $errors->first('email_address') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="mb-2">Publish Month <span class="text-danger"></span></label>
                        <input type="text" class="form-control publishmonth" id="datepicker" placeholder="Enter Publish Month" name="publish_month" value="@if (isset($report->publish_month)) {{ date('Y-m-d', strtotime($report->publish_month)) }} @endif">
                        @if ($errors->has('publish_month'))
                        <span class="text-danger">{{ $errors->first('publish_month') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="mb-2">Image <span class="text-danger"></span></label>
                        <input type="file" class="form-control" placeholder="Enter twitter" name="image" value="{{ old('image') }}">
                        @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="mb-2">Image Alt<span class="text-danger"></span></label>
                        <input type="text" class="form-control" placeholder="Enter Image  Alt" name="image_alt" value="@if (isset($report->image_alt)) {{ $report->image_alt }} @endif">
                        @if ($errors->has('image_alt'))
                        <span class="text-danger">{{ $errors->first('image_alt') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2">Summary/Description <span class="text-danger"></span></label>
                        <textarea class="form-control" name="description" rows="12">
@if (isset($report->description))
{{ $report->description }}
@endif
</textarea>
                        @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    @if (count($report->getReportTblSummary) > 0)
                    @foreach ($report->getReportTblSummary as $key => $tblSummary)
                    <div class="row" id="rowsummary{{ $key }}">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="mb-2">Heading<span class="text-danger"></span></label>
                                <input type="hidden" name="sid[]" class="form-control" id="sid{{ $key }}" value="{{ $tblSummary->id }}">
                                <input type="text" name="sheading[]" class="form-control" value="{{ $tblSummary->heading }}">
                                @if ($errors->has('sheading[]'))
                                <span class="text-danger">{{ $errors->first('sheading[]') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="mb-2">Details<span class="text-danger"></span></label>
                                <!-- <textarea type="text" class="form-control" name="sdetails[]">{{ $tblSummary->details }}</textarea> -->
                                <input type="text" name="sdetails[]" class="form-control" value="{{ $tblSummary->details }}">
                                @if ($errors->has('sdetails[]'))
                                <span class="text-danger">{{ $errors->first('sdetails[]') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2 mt-3">
                            <a onclick="addmoresummary()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>
                            <a onclick="removesummary('{{ $key }}','{{ $tblSummary->id }}')" data-id="{{ $tblSummary->id }}" class="btn btn-danger mt-3" style="width: 70px;">
                                <i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="mb-2">Heading<span class="text-danger"></span></label>
                                <input type="hidden" name="sid[]" class="form-control" id="" value="">
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
                            <a onclick="addmoresummary()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    @endif
                    <div id="rows"></div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2">Table of Contents <span class="text-danger"></span></label>
                        <textarea class="form-control" name="toc" rows="12">
@if (isset($report->toc))
{{ $report->toc }}
@endif
</textarea>
                        @if ($errors->has('toc'))
                        <span class="text-danger">{{ $errors->first('toc') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2">Segmentation <span class="text-danger"></span></label>
                        <textarea class="form-control" name="segment" rows="12">
@if (isset($report->segment))
{{ $report->segment }}
@endif
</textarea>
                        @if ($errors->has('segment'))
                        <span class="text-danger">{{ $errors->first('segment') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2">Methodology <span class="text-danger"></span></label>
                        <textarea class="form-control" name="methodology" rows="12">
@if (isset($report->methodology))
{{ $report->methodology }}
@endif
</textarea>
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
                        <input type="hidden" name="license_id" value="@if (isset($report->getReportLicenses->id)) {{ $report->getReportLicenses->id }} @endif">
                        <input type="text" class="form-control" placeholder="Enter Single User" name="single_user" value="@if (isset($report->getReportLicenses->single_user)) {{ $report->getReportLicenses->single_user }} @endif">
                        @if ($errors->has('single_user'))
                        <span class="text-danger">{{ $errors->first('single_user') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="mb-2">Multi User<span class="text-danger"></span></label>
                        <input type="text" class="form-control" placeholder="Enter Multi User" name="multi_user" value="@if (isset($report->getReportLicenses->multi_user)) {{ $report->getReportLicenses->multi_user }} @endif">
                        @if ($errors->has('multi_user'))
                        <span class="text-danger">{{ $errors->first('multi_user') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="mb-2">Enterprise<span class="text-danger"></span></label>
                        <input type="text" class="form-control" placeholder="Enter Enterprise" name="enterprise_user" value="@if (isset($report->getReportLicenses->enterprise_user)) {{ $report->getReportLicenses->enterprise_user }} @endif">
                        @if ($errors->has('enterprise_user'))
                        <span class="text-danger">{{ $errors->first('enterprise_user') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <hr class="bg-info">
                    <p><b>FAQ Section</b> <a onclick="addmore()" class="btn btn-success btn-sm mt-3"><i class="fa fa-plus"></i></a></p>
                    @foreach ($report->getReportFaq as $key => $list)
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="mb-2">Question<span class="text-danger"></span></label>
                                <input type="hidden" name="faq_id[]" value="@if (isset($list->id)) {{ $list->id }} @endif">
                                <textarea class="form-control" name="question[]">
@if (isset($list->question))
{{ $list->question }}
@endif
</textarea>
                                @if ($errors->has('question[]'))
                                <span class="text-danger">{{ $errors->first('question[]') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="mb-2">Answer<span class="text-danger"></span></label>
                                <textarea class="form-control" name="answer[]">
@if (isset($list->answer))
{{ $list->answer }}
@endif
</textarea>
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

                <!--<div class="col-md-12">
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
                                <input type="hidden" name="cagr_id" value="@if (isset($report->getReportCAGR->id)) {{ $report->getReportCAGR->id }} @endif">
                                <input type="text" class="form-control" name="cagr" placeholder="CAGR" value="@if (isset($report->getReportCAGR->cagr)) {{ $report->getReportCAGR->cagr }} @endif">
                            </div>
                        </div>
                    </div>
                    <p><b>Market Value Current and Forecast</b> <a onclick="addmarketvalue()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a></p>
                    @if (count($report->getReportmarketgraph) > 0)
                    @foreach ($report->getReportmarketgraph as $keys => $row)
                    <div class="row" id="marketvaluerow{{$keys}}">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="mb-2">Year<span class="text-danger"></span></label>
                                <input type="hidden" name="market_id[]" value="@if (isset($row->id)) {{ $row->id }} @endif">
                                <input type="text" class="form-control" name="marketyear[]" placeholder="Year" value="@if (isset($row->marketyear)) {{ $row->marketyear }} @endif">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                <input type="text" class="form-control" id="marketvalue{{$keys}}" name="marketvalue[]" placeholder="Percentage" value="@if (isset($row->marketvalue)) {{ $row->marketvalue }} @endif"
                                onkeyup="checkvalue('marketvalue{{$keys}}')">
                            </div>
                            <span class="text-danger" id="error_marketvalue{{$keys}}"></span>
                        </div>
                        <div class="col-md-2 mt-3">
                            <a onclick="addmarketvalue()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>&nbsp;
                            @if($keys!=0)
                            <a onclick="removemarketvalue('{{$keys}}','{{ $row->id }}')" class="btn btn-danger mt-3" style="width: 70px;"><i class="fa fa-trash"></i></a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12" id="marketvalue">

                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-md-12" id="marketvalue">

                        </div>
                    </div>
                    @endif

                    <p><b>Segment Graphs</b></p>
                    @if (count($report->getReportTypeSegmentgraph) > 0)
                    @php $i=0; @endphp
                    @foreach ($report->getReportTypeSegmentgraph as $kess => $res)
                    <div class="row border" id="main{{$kess}}">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Types<span class="text-danger"></span></label>
                                <input type="hidden" class="form-control" name="segmenttype_id[]" placeholder="Types" value="@if (isset($res->id)) {{ $res->id }} @endif">
                                <input type="text" class="form-control" name="segmenttypename[]" placeholder="Types" value="@if (isset($res->segmenttypename)) {{ $res->segmenttypename }} @endif">
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <a onclick="addrows()" style="width: 70px;" class="btn btn-success text-white mt-2"><i class="fa fa-plus-circle"></i></a>
                            @if($kess!=0)
                            <a class="add btn btn-danger text-white mt-2" onclick="removemain('{{$kess}}','{{ $res->id }}')" style="width: 70px;"><i class="fa fa-trash"></i></a>
                            @endif
                        </div>
                        @foreach ($res->getReportsSegmentgraph as $keys => $subtype)
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="width: 100%;">
                                    <thead>
                                        <th>Action</th>
                                        <th>Sub Type</th>
                                        <th>Percentage</th>
                                    </thead>
                                    <tbody id="new_chq{{ $i }}">
                                        <tr>
                                            <td><a class="add btn btn-sm btn-success text-white" onclick="add('{{ $i }}')" style="width: 70px;"><i class='fa fa-plus-circle'></i></a>
                                                &nbsp;
                                                <input type="hidden" name="product_array_key[]" class="form-control" value="{{ $kess }}">
                                                <input type="hidden" name="subtyppeof_id[]" class="form-control" value="@if (isset($subtype->id)) {{ $subtype->id }} @endif">
                                            </td>
                                            <td>
                                                <input type="text" name="segmentname[]" class="form-control" placeholder="Sub Type" value="@if (isset($subtype->segmentname)) {{ $subtype->segmentname }} @endif">
                                            </td>
                                            <td><input type="text" class="form-control" name="segmentvalue[]" placeholder="Percentage" value="@if (isset($subtype->segmentvalue)) {{ $subtype->segmentvalue }} @endif"
                                            id="segmentvalue{{$keys}}" onkeyup="checkvalue('segmentvalue{{$keys}}')">
                                            <span class="text-danger" id="error_segmentvalue{{$keys}}"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @php $i++; @endphp
                    @endforeach
                    @else
                    <div class="row border">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Types<span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="segmenttypename[]" placeholder="Types">
                                <input type="hidden" class="form-control" name="segmenttype_id[]" placeholder="Types" value="">
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
                                            <td><a class="add btn btn-sm btn-success text-white" onclick="add()" style="width: 70px;"><i class='fa fa-plus-circle'></i></a>
                                                <input type="hidden" name="product_array_key[]" class="form-control" value="0">
                                                <input type="hidden" name="subtyppeof_id[]" class="form-control" value="">
                                            </td>
                                            <td>
                                                <input type="text" name="segmentname[]" class="form-control" placeholder="Sub Type">
                                            </td>
                                            <td><input type="text" class="form-control" name="segmentvalue[]" placeholder="Percentage" value=""
                                            id="segmentvalue0" onkeyup="checkvalue('segmentvalue0')">
                                            <span class="text-danger" id="error_segmentvalue0"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="form-group row border" id="appendrow"></div>
                    <p><b> Region Wise Graphs</b> <a onclick="addregion()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a></p>
                    @if (count($report->getReportRegiongraph) > 0)
                    @foreach ($report->getReportRegiongraph as $keyse => $region)
                    <div class="row" id="regionrow{{$keyse}}">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="mb-2">Region Name<span class="text-danger"></span></label>
                                <input type="hidden" name="region_id[]" value="@if (isset($region->id)) {{ $region->id }} @endif">
                                <input type="text" class="form-control" name="regionname[]" placeholder="country Name" value="@if (isset($region->regionname)) {{ $region->regionname }} @endif">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="regionvalue[]" placeholder="Region Percentage" value="@if (isset($region->regionvalue)) {{ $region->regionvalue }} @endif"
                                id="regionvalue{{$keyse}}" onkeyup="checkvalue('regionvalue{{$keyse}}')">
                            </div>
                            <span class="text-danger" id="error_regionvalue{{$keyse}}"></span>
                        </div>
                        <div class="col-md-2 mt-3">
                        <a onclick="addregion()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>&nbsp;
                        <a onclick="removeregion('{{$keyse}}','{{ $region->id }}')" class="btn btn-danger mt-3" style="width: 70px;"><i class="fa fa-trash"></i></a>
                    </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12" id="regions"></div>

                    </div>
                    @else
                    <div class="row">
                        <div class="col-md-12" id="regions"></div>

                    </div>
                    @endif

                    <p><b>Market Share Graphs</b> <a onclick="addmarketshare()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a></p>
                    @if (count($report->getReportmarketsharegraph) > 0)
                    @foreach ($report->getReportmarketsharegraph as $keyss => $res)
                    <div class="row" id="marketsharerow{{$keyss}}">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="hidden" name="marketshare_id[]" value="@if (isset($res->id)) {{ $res->id }} @endif">
                                <label class="mb-2">Market<span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="marketsharename[]" placeholder="Market" value="@if (isset($res->marketsharename)) {{ $res->marketsharename }} @endif">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="mb-2">Percentage<span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="marketsharevalue[]" placeholder="Percentage" value="@if (isset($res->marketsharevalue)) {{ $res->marketsharevalue }} @endif"
                                id="marketsharevalue{{$keyss}}" onkeyup="checkvalue('marketsharevalue{{$keyss}}')">
                            </div>
                            <span class="text-danger" id="error_marketsharevalue{{$keyss}}"></span>
                        </div>
                        <div class="col-md-2 mt-3">
                        <a onclick="addmarketshare()" class="btn btn-success mt-3" style="width: 70px;"><i class="fa fa-plus-circle"></i></a>&nbsp;
                        @if($keyss!=0)
                        <a onclick="removemarketshare('{{$keyss}}','{{ $res->id }}')" class="btn btn-danger mt-3" style="width: 70px;"><i class="fa fa-trash"></i></a>
                        @endif
                    </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12" id="marketshares"></div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-md-12" id="marketshares"></div>
                    </div>
                    @endif

                </div> -->

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2">Customized <span class="text-danger"></span></label>
                        <textarea class="form-control" name="customized" rows="12">
@if (isset($report->customized))
{{ $report->customized }}
@endif
</textarea>
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
                        <label class="mb-2">Heading H1 <span class="text-danger"></span></label>
                        <input class="form-control" name="h1_column" value="@if (isset($report->h1_column)) {{ $report->h1_column }} @endif" />
                        @if ($errors->has('h1_column'))
                        <span class="text-danger">{{ $errors->first('h1_column') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2">Schema <span class="text-danger"></span></label>
                        <input class="form-control" name="schema" value="@if (isset($report->schema)) {{ $report->schema }} @endif" />
                        @if ($errors->has('schema'))
                        <span class="text-danger">{{ $errors->first('schema') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2">Meta Title <span class="text-danger"></span></label>
                        <input class="form-control" name="meta_title" value="@if (isset($report->meta_title)) {{ $report->meta_title }} @endif" />
                        @if ($errors->has('meta_title'))
                        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2">Meta Description <span class="text-danger"></span></label>
                        <input class="form-control" name="meta_des" value="@if (isset($report->meta_des)) {{ $report->meta_des }} @endif" />
                        @if ($errors->has('meta_des'))
                        <span class="text-danger">{{ $errors->first('meta_des') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="mb-2">Meta Keywords <span class="text-danger"></span></label>
                        <input class="form-control" name="metal_keywords" value="@if (isset($report->metal_keywords)) {{ $report->metal_keywords }} @endif" />
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
    var loopCount = 1;

    function addmore() {
        var new_item = '<div class="row" id="row' + loopCount + '">\
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
                            <a onclick="remove(' + loopCount + ')" class="btn btn-danger btn-sm mt-3"><i class="fa fa-trash"></i></a>\
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

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        //getsubcategory();

    });

    function getsubcategory() {
        let category_id = $('#category_id').val();
        let subcategoryid = $('#subcategory_id').val();

        $.ajax({
            type: "POST",
            url: "{{ url('admin/reportsubcategory/getSubCategory') }}",
            data: {
                category_id: category_id,
                subcategoryid: subcategoryid
            },
            success: function(data) {
                $('#sub_category_id').html(data);
            },
            error: function(data) {
                //console.log(data);
            }
        });
    }
</script>
@if (isset($i) && $i != '')
@php $i=$i;@endphp
@else
@php $i=0;@endphp
@endif

<script>
    var segmentCount = '{{ $i }}';

    function addrows() {
        //debugger;
        var new_item = '<div class="col-md-12 mt-3" id="main' + segmentCount +
            '"><div class="row">\
                <div class="form-group col-md-4">\
                  <label class="mb-2">Types<span class="text-danger"></span></label>\
                  <input type="hidden" class="form-control" name="segmenttype_id[]" placeholder="Types" value="">\
                    <input type="text" class="form-control" name="segmenttypename[]" placeholder="Types">\
                </div>\
                <div class="form-group col-md-3" style="margin-top: 3%;">\
                  <a class="add btn btn-sm btn-success text-white" style="width: 70px;" onclick="addrows()"><i class="fa fa-plus-circle"></i></a>&nbsp;\
                  <a class="add btn btn-sm btn-danger text-white" onclick="removemain(' +
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
                          <input type="hidden" name="subtyppeof_id[]" class="form-control" value="">\
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
                          <input type="hidden" name="subtyppeof_id[]" class="form-control" value="">\
                           <input type="text" name="segmentname[]"  class="form-control" placeholder="Sub Type">\
                          </td>\
                          <td><input type="text" class="form-control" name="segmentvalue[]" placeholder="Percentage" value="">\
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

    function removemain(id,main_id='') {
        if(main_id)
        {
            $.ajax({
            type: "POST",
            url: "{{ url('admin/reports/SegmentTypeDelete') }}",
            data: {
                id: main_id,
            },
            success: function(data) {
            },
            error: function(data) {
                //console.log(data);
            }
        });
        }
        $('#main' + id).remove();
    }


    var loopmarketvalueCount = 1;

    function addmarketvalue() {
        var new_item = '<div class="row" id="marketvaluerow' + loopmarketvalueCount + '">\
                    <div class="col-md-5">\
                        <div class="form-group">\
                            <label class="mb-2">Year<span class="text-danger"></span></label>\
                            <input type="hidden" name="market_id[]" value="">\
                            <input type="text" class="form-control" name="marketyear[]" placeholder="Year">\
                        </div>\
                    </div>\
                    <div class="col-md-5">\
                        <div class="form-group">\
                            <label class="mb-2">Percentage<span class="text-danger"></span></label>\
                            <input type="text" class="form-control" name="marketvalue[]" id="marketvalue'+loopmarketvalueCount+'" placeholder="Percentage" onkeyup=checkvalue("marketvalue'+loopmarketvalueCount+'")>\
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

    function removemarketvalue(ids,id='') {
        if(id)
        {
            $.ajax({
            type: "POST",
            url: "{{ url('admin/reports/MarketGraphDelete') }}",
            data: {
                id: id,
            },
            success: function(data) {
            },
            error: function(data) {
                //console.log(data);
            }
        });
        }
        $('#marketvaluerow' + ids).remove();
    }


    var loopregionCount = 1;

    function addregion() {
        var new_itemr = '<div class="row" id="regionrow' + loopregionCount + '">\
                    <div class="col-md-5">\
                        <div class="form-group">\
                            <label class="mb-2">Region Name<span class="text-danger"></span></label>\
                             <input type="hidden" name="region_id[]" value="">\
                            <input type="text" class="form-control" name="regionname[]" placeholder="Region Name">\
                        </div>\
                    </div>\
                    <div class="col-md-5">\
                        <div class="form-group">\
                            <label class="mb-2">Percentage<span class="text-danger"></span></label>\
                            <input type="text" class="form-control" id="regionvalue'+loopregionCount+'" name="regionvalue[]" placeholder="Region Percentage" onkeyup=checkvalue("regionvalue'+loopregionCount+'")>\
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

    function removeregion(ids,id='') {
        if(id)
        {
            $.ajax({
            type: "POST",
            url: "{{ url('admin/reports/removeregionDelete') }}",
            data: {
                id: id,
            },
            success: function(data) {
            },
            error: function(data) {
                //console.log(data);
            }
        });
        }
        $('#regionrow' + ids).remove();
    }

    var loopmarketshareCount = 1;

    function addmarketshare() {
        var new_items = '<div class="row" id="marketsharerow' + loopmarketshareCount + '">\
                     <div class="col-md-5">\
                            <div class="form-group">\
                                <label class="mb-2">Market<span class="text-danger"></span></label>\
                                <input type="hidden" name="marketshare_id[]" value="">\
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

    function removemarketshare(ids,id='') {
        if(id)
        {
            $.ajax({
            type: "POST",
            url: "{{ url('admin/reports/removemarketshare') }}",
            data: {
                id: id,
            },
            success: function(data) {
            },
            error: function(data) {
                //console.log(data);
            }
        });
        }
        $('#marketsharerow' + ids).remove();
    }
</script>



<script>
    var loopCountSummary = 10;

    function addmoresummary() {
        var new_item = '<div class="row" id="rowsummary' + loopCountSummary + '">\
            <div class="col-md-5">\
                <div class="form-group">\
                        <label class="mb-2">Heading<span class="text-danger"></span></label>\
                        <input type="hidden" name="sid[]" class="form-control" value="">\
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

    function removesummary(ids,id='') {
        if(id)
        {
            $.ajax({
            type: "POST",
            url: "{{ url('admin/reports/TblSummaryDelete') }}",
            data: {
                id: id,
            },
            success: function(data) {
            },
            error: function(data) {
                //console.log(data);
            }
        });
        }
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
@endsection
