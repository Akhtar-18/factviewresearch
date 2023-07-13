<?php

namespace App\Http\Controllers;

use App\Models\AboutUsModel;
use App\Models\ContactDetailsModel;
use App\Models\ContactEnquiryModel;
use App\Models\MarketGraphicalModel;
use App\Models\MarketShareGraphicalModel;
use App\Models\RegionGraphicalModel;
use App\Models\ReportCategoryModel;
use App\Models\ReportEnquiryModel;
use App\Models\ReportsModel;
use App\Models\SegmentGraphicalModel;
use App\Models\ServicesModel;
use App\Models\TestimonialModel;
use App\Models\WhyChooseUsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    public function home()
    {
        $data['reportsData']=ReportsModel::with(['getCategoryName','getSubCategoryName'])->select(['id','category_id','sub_category_id','heading','url','pages','publish_month','description'])->limit(6)->get();
        $data['contactData']=ContactDetailsModel::select(['company_name','address','contact_no','email_address','facebook','twitter','instagram','linkedin'])->get();
        $data['services']=ServicesModel::select(['id','heading','content'])->latest('id')->limit(6)->get();
        return view('front.home',$data);
    }

    public function report($category,$subcategory,$id,Request $request)
    {
        $data['reports']=ReportsModel::with(['getReportLicenses','getReportFaq','getReportmarketgraph','getReportmarketsharegraph','getReportSegmentgraph','getReportRegiongraph','getSubCategoryName','getReportCAGR'])->where('url',$id)->first();
        $data['whyusData']=WhyChooseUsModel::select(['heading','content'])->get();
        $data['contactData']=ContactDetailsModel::select(['contact_no','email_address','facebook','twitter','instagram','linkedin'])->get();
        if($data['reports']->id)
        {
            $marketshare=MarketShareGraphicalModel::select(['marketsharename','marketsharevalue'])
            ->where('report_id',$data['reports']->id)->limit(5)->get();
            $data['marketsharename'] =  $marketshare->pluck('marketsharename');
            $data['marketsharevalue'] =  $marketshare->pluck('marketsharevalue');


            $marketvalue=MarketGraphicalModel::select(['marketyear','marketvalue'])
            ->where('report_id',$data['reports']->id)->limit(7)->get();
            $data['marketyear'] =  $marketvalue->pluck('marketyear');
            $data['marketvalue'] =  $marketvalue->pluck('marketvalue');

            $regiongraph=RegionGraphicalModel::select(['regionname','regionvalue'])->where('report_id',$data['reports']->id)->limit(5)->get();
            $data['regionname'] =  $regiongraph->pluck('regionname');
            $data['regionvalue'] =  $regiongraph->pluck('regionvalue');

            $segmentgraph=SegmentGraphicalModel::select(['segmentname','segmentvalue'])->where('report_id',$data['reports']->id)->limit(5)->get();
            $data['segmentname'] =  $segmentgraph->pluck('segmentname');
            $data['segmentvalue'] =  $segmentgraph->pluck('segmentvalue');
        }



        return view('front.report',$data);
    }
    public function reports(Request $request)
    {
        if(isset($request->search))
        {
            $data['reports']=ReportsModel::latest('id')->with(['getSubCategoryName','getCategoryName'])
            ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
            ->where('heading', 'like', '%' . $request->search . '%')
            ->orderBy('id','desc')->paginate(10);
        }
        else
        {
            $data['reports']=ReportsModel::latest('id')->with(['getSubCategoryName','getCategoryName'])->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])->orderBy('id','desc')->paginate(10);
        }
        $data['ReportCategory']=ReportCategoryModel::with('getSubCategory')->select(['id','cat_name'])->get();

        $data['contactData']=ContactDetailsModel::select(['contact_no','email_address'])->first();
        return view('front.reports',$data);
    }

    public function reportcategory(Request $request)
    {
        if(isset($request->search))
        {
            $data['reports']=ReportsModel::latest('id')->with(['getSubCategoryName','getCategoryName'])
            ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
            ->where('heading', 'like', '%' . $request->search . '%')
            ->orderBy('id','desc')->paginate(10);
        }
        else
        {
            $data['reports']=ReportsModel::latest('id')->with(['getSubCategoryName','getCategoryName'])->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])->orderBy('id','desc')->paginate(10);
        }
        $data['ReportCategory']=ReportCategoryModel::with('getSubCategory')->select(['id','cat_name'])->get();

        $data['contactData']=ContactDetailsModel::select(['contact_no','email_address'])->first();
        return view('front.reportcategory',$data);
    }

    public function reportsubcategory(Request $request)
    {
        if(isset($request->search))
        {
            $data['reports']=ReportsModel::latest('id')->with(['getSubCategoryName','getCategoryName'])
            ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
            ->where('heading', 'like', '%' . $request->search . '%')
            ->orderBy('id','desc')->paginate(10);
        }
        else
        {
            $data['reports']=ReportsModel::latest('id')->with(['getSubCategoryName','getCategoryName'])->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])->orderBy('id','desc')->paginate(10);
        }
        $data['ReportCategory']=ReportCategoryModel::with('getSubCategory')->select(['id','cat_name'])->get();

        $data['contactData']=ContactDetailsModel::select(['contact_no','email_address'])->first();
        return view('front.reportsubcategory',$data);
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
             $reports=ReportsModel::latest('id')->with(['getSubCategoryName','getCategoryName'])->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])->orderBy('id','desc')->paginate(10);
            return view('front.ajaxreport',compact('reports'));
        }
    }
    public function about()
    {
        $data['aboutData']=AboutUsModel::all();
        return view('front.about',$data);
    }
    public function whowe()
    {
        return view('front.whowe');
    }
    public function whyus()
    {
        $data['whyusData']=WhyChooseUsModel::select(['heading','content'])->get();
        return view('front.whyus',$data);
    }

    public function partners()
    {
        return view('front.partners');
    }

    public function testimonials()
    {
        return view('front.testimonials');
    }

    public function contact()
    {
        $data['contactData']=ContactDetailsModel::select(['address','contact_no','email_address'])->first();
        return view('front.contact',$data);
    }
    public function services()
    {
        return view('front.services');
    }
    public function service($id,Request $request)
    {
        $data['services']=ServicesModel::select(['id','heading','content'])->where('id',$id)->first();
        return view('front.service-single',$data);
    }

    public function form()
    {
        return view('front.form');
    }

    public function enquiry($id,$type,Request $request)
    {
        
        $data['type']=$type;
        $data['reports']=ReportsModel::with(['getCategoryName'])->select(['id','url','publish_month','category_id','heading','pages'])->where('url',$id)->first();
        return view('front.form',$data);
    }
    function storeenquiry(Request $request)
    {
        
        $validator = Validator::make($request->all(), [

            'name'           => 'required',
            'email'          => 'required|email',
            'country'        => 'required',
            'contact_no'  => 'required|numeric',
            'organizations' => 'required',

        ]);

  

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()->all()]);

        }



        $input=$request->all();
        ReportEnquiryModel::create($input);
        return response()->json([ 'success'=> 'Form is successfully submitted!']);
    }

    function storecontact(Request $request)
    {
        
        $validator = Validator::make($request->all(), [

            'name'           => 'required',
            'email'          => 'required|email',
            'contact_no'  => 'required|numeric',
            'subject' => 'required',

        ]);

  

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()->all()]);

        }



        $input=$request->all();
        ContactEnquiryModel::create($input);
        return response()->json([ 'success'=> 'Form is successfully submitted!']);
    }

}
