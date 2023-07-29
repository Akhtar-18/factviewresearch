<?php

namespace App\Http\Controllers;

use App\Mail\AdminReportEnquir;
use App\Mail\MyReportEnquiry;
use App\Models\AboutUsModel;
use App\Models\Blog;
use App\Models\CaseStudy;
use App\Models\ContactDetailsModel;
use App\Models\ContactEnquiryModel;
use App\Models\MarketGraphicalModel;
use App\Models\MarketShareGraphicalModel;
use App\Models\PressRelease;
use App\Models\RegionGraphicalModel;
use App\Models\ReportCategoryModel;
use App\Models\ReportEnquiryModel;
use App\Models\ReportPayment;
use App\Models\ReportsModel;
use App\Models\ReportSubCategoryModel;
use App\Models\SegmentGraphicalModel;
use App\Models\ServicesModel;
use App\Models\TestimonialModel;
use App\Models\WhoWeModel;
use App\Models\WhyChooseUsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function home()
    {
        $data['aboutData']=AboutUsModel::select(['heading','content'])->get();
        $data['reportsData']=ReportsModel::with(['getCategoryName','getSubCategoryName'])->select(['id','category_id','sub_category_id','heading','url','pages','publish_month','description'])->limit(6)->get();
        $data['contactData']=ContactDetailsModel::select(['company_name','address','contact_no','email_address','facebook','twitter','instagram','linkedin'])->get();
        $data['services']=ServicesModel::select(['id','heading','content'])->latest('id')->limit(6)->get();
        $data['blogs']=Blog::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->limit(3)->get();
        $data['press']=PressRelease::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->limit(3)->get();
        $data['casses']=CaseStudy::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->limit(3)->get();
        return view('front.home',$data);
    }

    public function report($id,Request $request)
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
        // dd( $data['reports']);
        return view('front.reports',$data);
    }

    public function reportcategory($id,Request $request)
    {
        $category=ReportCategoryModel::where('cat_name',$id)->first();
        if(isset($category))
        {
            $data['reports']=ReportsModel::latest('id')->with(['getSubCategoryName','getCategoryName'])
            ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
            ->where('category_id',$category->id)
            ->orderBy('id','desc')->paginate(10);
        }
        else
        {
            $data['reports']=ReportsModel::latest('id')->with(['getSubCategoryName','getCategoryName'])->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])->orderBy('id','desc')->paginate(10);
        }
        $data['ReportCategory']=ReportCategoryModel::with('getSubCategory')->select(['id','cat_name'])->get();

        $data['contactData']=ContactDetailsModel::select(['contact_no','email_address'])->first();
        $data['category']=$id;
        return view('front.reportcategory',$data);
    }

    public function fetchcategory_data($id=null,Request $request)
    {
        if($request->ajax())
        {
            if($id)
            {
                $category=ReportCategoryModel::where('cat_name',$id)->first();
                $reports=ReportsModel::latest('id')
                ->with(['getSubCategoryName','getCategoryName'])
                ->where('category_id',$category->id)
                ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
                ->orderBy('id','desc')
                ->paginate(10);
            }
            else
            {
                $reports=ReportsModel::latest('id')
             ->with(['getSubCategoryName','getCategoryName'])
             ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
             ->orderBy('id','desc')
             ->paginate(10);
            }

            return view('front.ajaxcategoryreport',compact('reports'));
        }
    }

    public function reportsubcategory($id,Request $request)
    {
        $subcategory=ReportSubCategoryModel::where('sub_category',$id)->first();
        if($subcategory)
        {
            $data['reports']=ReportsModel::latest('id')
        ->with(['getSubCategoryName','getCategoryName'])
        ->where('sub_category_id',$subcategory->id)
        ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
        ->orderBy('id','desc')
        ->paginate(10);
        }
        else
        {
            $data['reports']=ReportsModel::latest('id')
            ->with(['getSubCategoryName','getCategoryName'])
            ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
            ->orderBy('id','desc')
            ->paginate(10);
        }


        $data['ReportCategory']=ReportCategoryModel::with('getSubCategory')->select(['id','cat_name'])->get();
        $data['subcategory']=$id;

        $data['contactData']=ContactDetailsModel::select(['contact_no','email_address'])->first();
        return view('front.reportsubcategory',$data);
    }

    public function fetchsubcategory_data($id=null,Request $request)
    {
        if($request->ajax())
        {
            if($id)
            {
                $subcategory=ReportSubCategoryModel::where('sub_category',$id)->first();
                $reports=ReportsModel::latest('id')
                ->with(['getSubCategoryName','getCategoryName'])
                ->where('sub_category_id',$subcategory->id)
                ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
                ->orderBy('id','desc')
                ->paginate(10);
            }
            else
            {
                $reports=ReportsModel::latest('id')
             ->with(['getSubCategoryName','getCategoryName'])
             ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
             ->orderBy('id','desc')
             ->paginate(10);
            }

            return view('front.ajaxsubreport',compact('reports'));
        }
    }
    public function fetch_datas(Request $request)
    {
        ///return $request;exit;
        if($request->ajax())
        {
            $reports=ReportsModel::latest('id')
             ->with(['getSubCategoryName','getCategoryName'])
             ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
             ->orderBy('id','desc')
             ->paginate(10);
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
        $data['whoweData']=WhoWeModel::all();
        return view('front.whowe',$data);
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
        $data['services']=ServicesModel::select(['id','heading','content'])->latest('id')->get();
        return view('front.services',$data);
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
        //return $request;

        $validator = Validator::make($request->all(), [

            'name'           => 'required',
            'email'          => 'required|email',
            'country'        => 'required',
            'contact_no'  => 'required|numeric',
            'organizations' => 'required',
            'captcha' => 'required|captcha'

        ]);



        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()->all()]);

        }


        $type = $request->types;
        $name = $request->name;
        $input=$request->all();
        ReportEnquiryModel::create($input);



        $email = 'minhaj.khan@researchforetell.com';

        Mail::to($email)->send(new MyReportEnquiry($type,$name));
        Mail::to($email)->send(new AdminReportEnquir($type,$name));
        return response()->json([ 'success'=> 'Form is successfully submitted!',
                                'id'=>$request->report_id]);
    }

    function enquerythankyou($id)
    {
        $reports=ReportsModel::latest('id')
             ->select(['id','heading'])->find($id);
        return view('front.thankyou',compact('reports'));
    }

    function storecontact(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'name'           => 'required',
            'email'          => 'required|email',
            'contact_no'  => 'required|numeric',
            'subject' => 'required',
            'captcha' => 'required|captcha'

        ]);



        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()->all()]);

        }



        $input=$request->all();
        ContactEnquiryModel::create($input);


        return response()->json([ 'success'=> 'Form is successfully submitted!']);
    }

    public function blogs()
    {
        $data['blogs']=Blog::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->paginate(10);
        return view('front.blog-grid',$data);
    }
    public function fetch_blogs(Request $request)
    {
        ///return $request;exit;
        if($request->ajax())
        {
            $blogs=Blog::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->paginate(10);
            return view('front.ajaxblog',compact('blogs'));
        }
    }

    public function blog($url,Request $request)
    {
        $data['blog']=Blog::select('*')->where('url',$url)->first();
        return view('front.blog-post',$data);
    }


    public function pressreleases()
    {
        $data['press']=PressRelease::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->paginate(10);
        return view('front.press-grid',$data);
    }
    public function fetch_press(Request $request)
    {
        if($request->ajax())
        {
            $press=PressRelease::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->paginate(10);
            return view('front.ajaxpress',compact('press'));
        }
    }

    public function press($url,Request $request)
    {
        $data['press']=PressRelease::select('*')->where('url',$url)->first();
        return view('front.press-details',$data);
    }

    public function casestudies()
    {
        $data['case']=CaseStudy::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->paginate(10);
        return view('front.case-studies-grid',$data);
    }
    public function fetch_case(Request $request)
    {
        if($request->ajax())
        {
            $case=CaseStudy::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->paginate(10);
            return view('front.ajaxcase',compact('case'));
        }
    }

    public function casestudydetails($url,Request $request)
    {
        $data['case']=CaseStudy::select('*')->where('url',$url)->first();
        return view('front.case-details',$data);
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function reloadformCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function buynow($id)
    {
        $reports=ReportsModel::with(['getCategoryName','getReportLicenses'])->select(['id','url','publish_month','category_id','heading','pages'])->find($id);
        return view('front.buynowform',compact('reports'));
    }


    function storebuynow(Request $request)
    {
        //return $request;

        $validator = Validator::make($request->all(), [

            'name'           => 'required',
            'email'          => 'required|email',
            'country_name'        => 'required',
            'contact'  => 'required|numeric',
            'lisence_amount' => 'required',
            'company_name'=>'required',
            'job_title' =>'required'
        ]);



        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()->all()]);

        }


        // $type = $request->types;
        // $name = $request->name;
        $input=$request->all();
        ReportPayment::create($input);



        // $email = 'minhaj.khan@researchforetell.com';

        // Mail::to($email)->send(new MyReportEnquiry($type,$name));
        // Mail::to($email)->send(new AdminReportEnquir($type,$name));
        return response()->json([ 'success'=> 'Form is successfully submitted!',
                                'id'=>$request->report_id]);
    }

    public function privacypolicy()
    {
        return view('front.privacypolicy');
    }

    public function refund()
    {
        return view('front.refund');
    }

    public function terms()
    {
        return view('front.terms');
    }

    public function disclaimer()
    {
        return view('front.disclaimer');
    }
}
