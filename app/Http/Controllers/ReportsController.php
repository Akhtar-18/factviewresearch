<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportsRequest;
use App\Imports\MarketValues;
use App\Imports\ReportFaqImport;
use App\Imports\SeoImports;
use App\Models\MarketGraphicalModel;
use App\Models\MarketShareGraphicalModel;
use App\Models\RegionGraphicalModel;
use App\Models\ReportCategoryModel;
use App\Models\ReportsFaqModel;
use App\Models\ReportsLicenseModel;
use App\Models\ReportsModel;
use App\Models\SegmentGraphicalModel;
use App\Models\SegmentType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\CagrModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportReport;
use App\Imports\ReportContentImport;
use App\Imports\SegmentImport;
use App\Models\TblSummary;
use Illuminate\Support\Facades\URL;

class ReportsController extends Controller
{
    public function index()
    {
        return view('admin.home.reportslist');
    }


    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = ReportsModel::with(['getCategoryName', 'getSubCategoryName'])->select(['id', 'category_id', 'sub_category_id', 'heading', 'url', 'pages', 'publish_month'])->orderBy('id', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('category_id', function ($row) {
                    if (isset($row->getCategoryName->cat_name)) {
                        $contents = $row->getCategoryName->cat_name;
                    } else {
                        $contents = '';
                    }

                    return $contents;
                })

                ->addColumn('url', function ($row) {
                    if (isset($row->url)) {
                        $contents = URL::to('report/') . '/' . $row->url;
                        $url = '<a  href="' . $contents . '">' . $contents . '</a>';
                    } else {
                        $url = '';
                    }

                    return $url;
                })


                ->addColumn('action', function ($row) {
                    if (auth()->user()->can('reports-edit')) {
                        $editbtn = '<a  href="' . url('admin/reports/edit/' . $row->id) . '" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
                    } else {
                        $editbtn = '';
                    }
                    if (auth()->user()->can('reports-delete')) {
                        $deletebtn = '<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal' . $row->id . '"><i class="fa fa-trash"></i></a>';
                    } else {
                        $deletebtn = '';
                    }
                    $btn = $editbtn . '|' . $deletebtn . '
                  <div class="modal fade" id="DeleteModal' . $row->id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <form action="' . url('admin/reports/delete/') . '/' . $row->id . '" method="post">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                              </button>
                          </div>
                          <input type="hidden" name="_token" value="' . @csrf_token() . '">
                          <div class="modal-body"> Are you sure you want to delete this data?</div>
                          <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                              <button class="btn btn-danger" type="submit">Submit</button>
                          </div>
                      </div>
                  </div>
              </div>';

                    return $btn;
                })
                ->rawColumns(['category_id', 'url', 'action'])
                ->make(true);
        }
    }

    public function add(Request $request)
    {
        $data['category'] = ReportCategoryModel::select(['id', 'cat_name'])->get();
        return view('admin.home.addreports', $data);
    }

    public function submit(ReportsRequest $request)
    {
        $request->validated();
        if ($request->file('image')) {
            $image = ImageUpload('Reports', $request->file('image'));
        } else {
            $image = "";
        }
        //return $request->all();

        /*************************Reports Create ************************/
        $insertReportData = [
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'heading' => $request->heading,
            'url' => $request->url,
            'pages' => $request->pages,
            'publish_month' => $request->publish_month,
            'image' => $image,
            'image_alt' => $request->image_alt,
            'customized' => $request->customized,
            'description' => $request->description,
            'toc' => $request->toc,
            'segment' => $request->segment,
            'methodology' => $request->methodology,
            'schema' => $request->schema,
            'meta_title' => $request->meta_title,
            'meta_des' => $request->meta_des,
            'metal_keywords' => $request->metal_keywords,
        ];
        $reports = ReportsModel::create($insertReportData);
        $report_id = $reports->id;


        /*************************Reports License Create ************************/
        $insertLicenseData = [
            'report_id' => $report_id,
            'single_user' => $request->single_user,
            'multi_user' => $request->multi_user,
            'enterprise_user' => $request->enterprise_user
        ];
        ReportsLicenseModel::create($insertLicenseData);

        /*************************Reports FAQ Create ************************/

        foreach ($request->question as $key => $list) {
            if (!empty($request->question[$key])) {
                $insertFaqData = [
                    'report_id' => $report_id,
                    'question' => $request->question[$key],
                    'answer' => $request->answer[$key],
                ];
                ReportsFaqModel::create($insertFaqData);
            }

        }
        // summary table
        if($request->sheading)
        {
            foreach ($request->sheading as $key => $list) {
                if (!empty($request->sheading[$key])) {
                    $insertTblSummaryData = [
                        'report_id' => $report_id,
                        'heading' => $request->sheading[$key],
                        'details' => $request->sdetails[$key],
                    ];
                    TblSummary::create($insertTblSummaryData);
                }
    
            }
        }



        /**************************CAGR Graph Create **********************/
        if (!empty($request->cag)) {
            CagrModel::create([
                'report_id' => $report_id,
                'cagr' => $request->cagr,
            ]);
        }


        /*************************Reports Marketyear Graph Create ************************/

        foreach ($request->marketyear as $key => $list) {
            if (!empty($request->marketyear[$key])) {
                $insertgraph = [
                    'report_id' => $report_id,
                    'marketyear' => $request->marketyear[$key],
                    'marketvalue' => $request->marketvalue[$key],
                ];
                MarketGraphicalModel::create($insertgraph);
            }
        }


        /*************************Reports Segment Graph Create ************************/

        foreach ($request->segmenttypename as $key => $list) {
            if (!empty($request->segmenttypename[$key])) {
                $SegmentTypeInsert = [
                    'report_id' => $report_id,
                    'segmenttypename' => $request->segmenttypename[$key]
                ];
                $segmentData = SegmentType::create($SegmentTypeInsert);
                $segment_types = $segmentData->id;


                foreach ($request->segmentname as $keys => $row) {

                    if (!empty($request->segmentname[$keys]) && $key == $request->product_array_key[$keys]) {
                        $insertsegmentData = [
                            'report_id' => $report_id,
                            'segmentname' => $request->segmentname[$keys],
                            'segmentvalue' => $request->segmentvalue[$keys],
                            'segment_types' => $segment_types,
                        ];
                        SegmentGraphicalModel::create($insertsegmentData);
                    }

                }
            }

        }


        /*************************Reports Region Graph Create ************************/

        foreach ($request->regionname as $key => $list) {
            if (!empty($request->regionvalue[$key])) {
                $insertRegionData = [
                    'report_id' => $report_id,
                    'regionname' => $request->regionname[$key],
                    'regionvalue' => $request->regionvalue[$key],
                ];
                RegionGraphicalModel::create($insertRegionData);
            }
        }


        /*************************Reports Market Share Graph Create ************************/

        foreach ($request->marketsharename as $key => $list) {
            if (!empty($request->marketsharename[$key])) {
                $insertmarketshareData = [
                    'report_id' => $report_id,
                    'marketsharename' => $request->marketsharename[$key],
                    'marketsharevalue' => $request->marketsharevalue[$key],
                ];
                MarketShareGraphicalModel::create($insertmarketshareData);
            }
        }

        return redirect('/admin/reports')->with('success', 'Reports created successfully.');
    }
    public function getSlug(Request $request)
    {
        $url = \Str::slug($request->heading);
        echo $url;
    }
    public function edit($id)
    {
        $reportcategory = ReportsModel::with('getReportLicenses')
            ->with('getReportFaq')
            ->with('getReportmarketgraph')
            ->with('getReportmarketsharegraph')
            ->with('getReportTypeSegmentgraph.getReportsSegmentgraph')
            ->with('getReportRegiongraph')
            ->with('getReportCAGR')
            ->with('getReportTblSummary')
            ->find($id);
        if ($reportcategory == '') {
            return redirect('admin/reportcategory/')
                ->with('error', "Category is Not Avaiable");
        } else {
            $data['category'] = ReportCategoryModel::select(['id', 'cat_name'])->get();
            $data['report'] = $reportcategory;
            //dd($data['report']);
            return view('admin.home.editreports', $data);
        }
    }

    public function update($id, Request $request)
    {

        $reports = ReportsModel::find($id);
        if ($request->file('image')) {
            $image = ImageUpload('Reports', $request->file('image'));
        } else {
            $image = $reports->image;
        }

        //echo "<pre>";
        //return $request->all();
        /*************************Reports Update ************************/
        $insertReportData = [
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'heading' => $request->heading,
            'url' => $request->url,
            'pages' => $request->pages,
            'publish_month' => $request->publish_month,
            'image' => $image,
            'image_alt' => $request->image_alt,
            'customized' => $request->customized,
            'description' => $request->description,
            'toc' => $request->toc,
            'segment' => $request->segment,
            'methodology' => $request->methodology,
            'schema' => $request->schema,
            'meta_title' => $request->meta_title,
            'meta_des' => $request->meta_des,
            'metal_keywords' => $request->metal_keywords,
        ];
        $reports->update($insertReportData);
        $report_id = $id;
        if ($request->license_id) {
            $reportLicenseDat = ReportsLicenseModel::find($request->license_id);
            /*************************Reports License Update ************************/
            $insertLicenseData = [
                'report_id' => $report_id,
                'single_user' => $request->single_user,
                'multi_user' => $request->multi_user,
                'enterprise_user' => $request->enterprise_user
            ];
            $reportLicenseDat->update($insertLicenseData);
        } else {
            /*************************Reports License Insert ************************/
            $insertLicenseData = [
                'report_id' => $report_id,
                'single_user' => $request->single_user,
                'multi_user' => $request->multi_user,
                'enterprise_user' => $request->enterprise_user
            ];
            ReportsLicenseModel::create($insertLicenseData);
        }


        /*************************Reports FAQ Create ************************/
        if ($request->question) {
            foreach ($request->question as $key => $list) {
                if (!empty($request->answer[$key])) {
                    if ($request->faq_id[$key] != '') {
                        $faqData = ReportsFaqModel::find($request->faq_id[$key]);
                        $insertFaqData = [
                            'report_id' => $report_id,
                            'question' => $request->question[$key],
                            'answer' => $request->answer[$key],
                        ];
                        $faqData->update($insertFaqData);
                    } else {

                        $insertFaqData = [
                            'report_id' => $report_id,
                            'question' => $request->question[$key],
                            'answer' => $request->answer[$key],
                        ];
                        ReportsFaqModel::create($insertFaqData);
                    }
                }

            }
        }

       /*************************tbl summary ***************************/ 
       //dd($request->sid);
       if ($request->sheading) {
        foreach ($request->sheading as $key => $list) {
            if (!empty($request->sdetails[$key])) {
                if ($request->sid[$key] != '') {
                    $faqData = TblSummary::find($request->sid[$key]);
                    $insertTblSummaryData = [
                        'report_id' => $report_id,
                        'heading' => $request->sheading[$key],
                        'details' => $request->sdetails[$key],
                    ];
                    $faqData->update($insertTblSummaryData);
                } else {

                    $insertTblSummaryData = [
                        'report_id' => $report_id,
                        'heading' => $request->sheading[$key],
                        'details' => $request->sdetails[$key],
                    ];
                    TblSummary::create($insertTblSummaryData);
                }
            }

        }
    } 


        /**************************CAGR Graph Update **********************/
        $cagr = CagrModel::find($request->cagr_id);
        if (empty($cagr)) {
            CagrModel::create([
                'report_id' => $report_id,
                'cagr' => $request->cagr,
            ]);
        } else {
            if (!empty($request->cagr)) {
                $cagr->update(['cagr' => $request->cagr]);
            }
        }


        /*************************Reports Marketyear Graph Create ************************/
        if (isset($request->marketyear)) {
            foreach ($request->marketyear as $key => $list) {
                if (!empty($request->marketyear[$key])) {
                    if ($request->market_id[$key] != '') {
                        $marketdata = MarketGraphicalModel::find($request->market_id[$key]);
                        $insertgraph = [
                            'report_id' => $report_id,
                            'marketyear' => $request->marketyear[$key],
                            'marketvalue' => $request->marketvalue[$key],
                        ];
                        $marketdata->update($insertgraph);
                    } else {

                        $insertgraph = [
                            'report_id' => $report_id,
                            'marketyear' => $request->marketyear[$key],
                            'marketvalue' => $request->marketvalue[$key],
                        ];
                        MarketGraphicalModel::create($insertgraph);
                    }
                }

            }
        }

        /*************************Reports Segment Graph Create ************************/

        foreach ($request->segmenttypename as $key => $list) {
            if (!empty($request->segmenttypename[$key])) {

                if ($request->segmenttype_id[$key] != '') {

                    $dataSegment = SegmentType::find($request->segmenttype_id[$key]);
                    $dataSegment->update(['report_id' => $report_id, 'segmenttypename' => $request->segmenttypename[$key]]);
                    $segment_types = $request->segmenttype_id[$key];
                } else {
                    $SegmentTypeInsert = [
                        'report_id' => $report_id,
                        'segmenttypename' => $request->segmenttypename[$key]
                    ];
                    $segmentData = SegmentType::create($SegmentTypeInsert);
                    $segment_types = $segmentData->id;

                }


                if($request->segmentname)
                {
                    foreach ($request->segmentname as $keys => $row) {

                        if (!empty($request->segmentname[$keys]) && $key == $request->product_array_key[$keys]) {
                            if ($request->subtyppeof_id[$keys] != '') {
                                $Segmentdatas = SegmentGraphicalModel::find($request->subtyppeof_id[$keys]);
                                $Segmentdatas->update([
                                    'report_id' => $report_id,
                                    'segmentname' => $request->segmentname[$keys],
                                    'segmentvalue' => $request->segmentvalue[$keys],
                                    'segment_types' => $segment_types,
                                ]);
                            } else {
                                $insertsegmentData = [
                                    'report_id' => $report_id,
                                    'segmentname' => $request->segmentname[$keys],
                                    'segmentvalue' => $request->segmentvalue[$keys],
                                    'segment_types' => $segment_types,
                                ];
                                SegmentGraphicalModel::create($insertsegmentData);
                            }
    
                        }
    
                    }
                }
                
            }

        }

        /*************************Reports Region Graph Create ************************/
        if (isset($request->regionname)) {
            foreach ($request->regionname as $key => $list) {
                if (!empty($request->regionvalue[$key])) {
                    if ($request->region_id[$key] != '') {
                        $regionData = RegionGraphicalModel::find($request->region_id[$key]);
                        $insertRegionData = [
                            'report_id' => $report_id,
                            'regionname' => $request->regionname[$key],
                            'regionvalue' => $request->regionvalue[$key],
                        ];
                        $regionData->update($insertRegionData);
                    } else {

                        $insertRegionData = [
                            'report_id' => $report_id,
                            'regionname' => $request->regionname[$key],
                            'regionvalue' => $request->regionvalue[$key],
                        ];
                        RegionGraphicalModel::create($insertRegionData);
                    }
                }

            }
        }


        /*************************Reports Market Share Graph Create ************************/
        if (isset($request->marketsharename)) {
            foreach ($request->marketsharename as $key => $list) {
                if (!empty($request->marketsharevalue[$key])) {
                    if ($request->marketshare_id[$key] != '') {

                        $marketshareData = MarketShareGraphicalModel::find($request->marketshare_id[$key]);
                        $insertmarketshareData = [
                            'report_id' => $report_id,
                            'marketsharename' => $request->marketsharename[$key],
                            'marketsharevalue' => $request->marketsharevalue[$key],
                        ];
                        $marketshareData->update($insertmarketshareData);
                    } else {

                        $insertmarketshareData = [
                            'report_id' => $report_id,
                            'marketsharename' => $request->marketsharename[$key],
                            'marketsharevalue' => $request->marketsharevalue[$key],
                        ];
                        MarketShareGraphicalModel::create($insertmarketshareData);
                    }
                }

            }
        }

        return redirect('/admin/reports')->with('success', 'Reports Update successfully.');
    }
    public function delete($id)
    {
        $careers = ReportsModel::find($id);
        $careers->delete();
        $license = ReportsLicenseModel::where('report_id', $id);
        $license->delete();

        $faq = ReportsFaqModel::where('report_id', $id);
        $faq->delete();

        $market = MarketGraphicalModel::where('report_id', $id);
        $market->delete();

        $segment = SegmentGraphicalModel::where('report_id', $id);
        $segment->delete();
        $region = RegionGraphicalModel::where('report_id', $id);
        $region->delete();
        $share = MarketShareGraphicalModel::where('report_id', $id);
        $share->delete();

        return redirect('admin/reports/')->with('success', 'Report Deleted successfully');
    }

    public function bulkUpload()
    {
        return view('admin.home.bulk-upload.index');
    }

    public function ReportContentImports(Request $request)
    {
        Excel::import(new ReportContentImport, $request->file('content_bulk')->store('files'));
        return redirect('admin/reports/bulk-upload')->with('success', 'Report Content Uploaded Successfully');
    }
    public function reportFaqImports(Request $request)
    {
        Excel::import(new ReportFaqImport, $request->file('faq_bulk')->store('files'));
        return redirect('admin/reports/bulk-upload')->with('success', 'Report FAQ Uploaded Successfully');
    }
    public function marketValueImports(Request $request)
    {
        Excel::import(new MarketValues, $request->file('market_value')->store('files'));
        return redirect('admin/reports/bulk-upload')->with('success', 'Report Graph Uploaded Successfully');
    }
    public function seoImports(Request $request)
    {
        Excel::import(new SeoImports, $request->file('seo_bulk')->store('files'));
        return redirect('admin/reports/bulk-upload')->with('success', 'Report Seo Uploaded Successfully');
    }
    public function SegmentImports(Request $request)
    {
        Excel::import(new SegmentImport, $request->file('segment_files')->store('files'));
        return redirect('admin/reports/bulk-upload')->with('success', 'Report Graph Uploaded Successfully');
    }

    public function export(Request $request)
    {
        return Excel::download(new ExportReport, 'reports.csv');
    }
}
