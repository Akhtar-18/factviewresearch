<?php

namespace App\Http\Controllers;

use App\Models\ReportPayment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderHistoryController extends Controller
{
    public function index()
    {
        return view('admin.payment.index');
    }
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = ReportPayment::with('getReportName')
            ->select(['id','report_id','name','company_name','job_title','country_name','state_name','city_name','zip_code','email','contact','lisence_amount','address','status'])
            ->latest('id');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('report_id', function($row){
                        $contents = isset($row->getReportName->heading)?$row->getReportName->heading:'';
                        return $contents;
                      })

                    ->rawColumns(['report_id'])
                    ->make(true);
        }
        
    }


}
