@extends('layout')
@section('title', 'Bulk Upload')
@section('page')
    <div class="container-fluid">


        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bulk Upload</h6>
                <a href="{{ url('admin/reportcategory') }}">
                    <span class="btn btn-primary float-right">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                    </span>
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div id="accordion" class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Report Content Bulk Upload
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <form action="{{ secure_url('admin/reports/reportContentImports') }}" method="POST"
                                            enctype='multipart/form-data'>
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="mb-2">Report Content Bulk Upload<span
                                                                class="text-danger">*</span></label>
                                                        <input type="file" name="content_bulk" class="form-control"
                                                            required>
                                                        @if ($errors->has('content_bulk'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('content_bulk') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-success">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                            Report FAQ Bulk Upload
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <form action="{{ secure_url('admin/reports/reportFaqImports') }}" method="POST"
                                            enctype='multipart/form-data'>
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="mb-2">Report FAQ Bulk Upload<span
                                                                class="text-danger">*</span></label>
                                                        <input type="file" name="faq_bulk" class="form-control" required>
                                                        @if ($errors->has('content_bulk'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('content_bulk') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-success">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Report Graph Bulk Upload
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <form action="{{ secure_url('admin/reports/marketValueImports') }}" method="POST"
                                            enctype='multipart/form-data'>
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="mb-2">Report Graph Bulk Upload<span
                                                                class="text-danger">*</span></label>
                                                        <input type="file" name="market_value" class="form-control"
                                                            required>
                                                        @if ($errors->has('market_value'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('market_value') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-success">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-header" id="headingSegment">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseSegment" aria-expanded="false"
                                            aria-controls="collapseSegment">
                                            Segment Graph Bulk Upload
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseSegment" class="collapse" aria-labelledby="headingSegment"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <form action="{{ secure_url('admin/reports/SegmentImports') }}" method="POST"
                                            enctype='multipart/form-data'>
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="mb-2">Segment Graph Bulk Upload<span
                                                                class="text-danger">*</span></label>
                                                        <input type="file" name="segment_files" class="form-control"
                                                            required>
                                                        @if ($errors->has('segment_files'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('segment_files') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-success">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour">
                                            Report SEO Section Bulk Upload
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <form action="{{ secure_url('admin/reports/seoImports') }}" method="POST"
                                            enctype='multipart/form-data'>
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="mb-2">Report SEO Section Bulk Upload<span
                                                                class="text-danger">*</span></label>
                                                        <input type="file" name="seo_bulk" class="form-control"
                                                            required>
                                                        @if ($errors->has('seo_bulk'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('seo_bulk') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-success">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection
