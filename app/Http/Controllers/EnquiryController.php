<?php

namespace App\Http\Controllers;

use App\Models\ContactEnquiryModel;
use App\Models\ReportEnquiryModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EnquiryController extends Controller
{

    public function index()
    {
        return view('admin.enquiry.report-enquiry');
    }
    public function enquiry(Request $request)
    {
        if ($request->ajax()) {
            $data = ReportEnquiryModel::with('getReportName')
            ->select(['id','report_id','name','email','country','contact_no','organizations','others'])
            ->where(['types'=>'enquiry'])
            ->latest('id');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('report_id', function($row){
                        $contents = isset($row->getReportName->heading)?$row->getReportName->heading:'';
                        return $contents;
                      })


              ->addColumn('action', function($row)
              {

                  $deletebtn='<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal'.$row->id.'"><i class="fa fa-trash"></i></a>';

                $btn = $deletebtn.'
        <div class="modal fade" id="DeleteModal'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="'.secure_url('admin/enquiry/delete/').'/'.$row->id.'" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <input type="hidden" name="_token" value="'.@csrf_token().'">
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
                    ->rawColumns(['report_id','action'])
                    ->make(true);
        }

    }

    public function reportRequest(Request $request)
    {
        if ($request->ajax()) {
            $data = ReportEnquiryModel::with('getReportName')
            ->select(['id','report_id','name','email','country','contact_no','organizations','others'])
            ->where(['types'=>'request'])
            ->latest('id');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('report_id', function($row){
                        $contents = isset($row->getReportName->heading)?$row->getReportName->heading:'';
                        return $contents;
                      })


              ->addColumn('action', function($row)
              {

                  $deletebtn='<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal'.$row->id.'"><i class="fa fa-trash"></i></a>';

                $btn = $deletebtn.'
        <div class="modal fade" id="DeleteModal'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="'.secure_url('admin/enquiry/delete/').'/'.$row->id.'" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <input type="hidden" name="_token" value="'.@csrf_token().'">
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
                    ->rawColumns(['report_id','action'])
                    ->make(true);
        }

    }

    public function reportDiscount(Request $request)
    {
        if ($request->ajax()) {
            $data = ReportEnquiryModel::with('getReportName')
            ->select(['id','report_id','name','email','country','contact_no','organizations','others'])
            ->where(['types'=>'discount'])
            ->latest('id');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('report_id', function($row){
                        $contents = isset($row->getReportName->heading)?$row->getReportName->heading:'';
                        return $contents;
                      })


              ->addColumn('action', function($row)
              {

                  $deletebtn='<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal'.$row->id.'"><i class="fa fa-trash"></i></a>';

                $btn = $deletebtn.'
        <div class="modal fade" id="DeleteModal'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="'.secure_url('admin/enquiry/delete/').'/'.$row->id.'" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <input type="hidden" name="_token" value="'.@csrf_token().'">
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
                    ->rawColumns(['report_id','action'])
                    ->make(true);
        }

    }

    public function delete($id)
    {
      $enquiry=ReportEnquiryModel::find($id);
      $enquiry->delete();
      return redirect('admin/enquiry/')->with('success','Enquiry Deleted successfully');
    }


    public function deletecontact($id)
    {
      $enquiry=ContactEnquiryModel::find($id);
      $enquiry->delete();
      return redirect('admin/enquiry/')->with('success','Contact Enquiry Deleted successfully');
    }

     public function contact(Request $request)
    {
        if ($request->ajax()) {
            $data = ContactEnquiryModel::select(['id','name','email','country','contact_no','subject','msg'])
            ->latest('id');
            return DataTables::of($data)
                    ->addIndexColumn()
              ->addColumn('action', function($row)
              {

                  $deletebtn='<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal'.$row->id.'"><i class="fa fa-trash"></i></a>';

                $btn = $deletebtn.'
        <div class="modal fade" id="DeleteModal'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form action="'.secure_url('admin/enquiry/deletecontact/').'/'.$row->id.'" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <input type="hidden" name="_token" value="'.@csrf_token().'">
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
                    ->rawColumns(['action'])
                    ->make(true);
        }

    }
}
