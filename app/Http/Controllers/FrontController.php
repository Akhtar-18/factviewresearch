<?php

namespace App\Http\Controllers;

use App\Mail\AdminReportEnquiry;
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
use App\Models\SegmentType;
use App\Models\ServicesModel;
use App\Models\TestimonialModel;
use App\Models\WhoWeModel;
use App\Models\WhyChooseUsModel;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class FrontController extends Controller
{
    public function home()
    {
        $data['aboutData']=AboutUsModel::select(['heading','content'])->get();
        $data['reportsData']=ReportsModel::with(['getCategoryName','getSubCategoryName'])->select(['id','category_id','sub_category_id','heading','url','pages','publish_month','description'])->where('status','1')->limit(4)->get();
        $data['contactData']=ContactDetailsModel::select(['company_name','address','contact_no','email_address','facebook','twitter','instagram','linkedin'])->get();
        $data['services']=ServicesModel::select(['id','heading','content','slug'])->latest('id')->limit(6)->get();
        $data['blogs']=Blog::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->limit(3)->get();
        $data['press']=PressRelease::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->limit(3)->get();
        $data['casses']=CaseStudy::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->limit(3)->get();
        return view('front.index',$data);
    }

    public function report($id, Request $request)
    {
        $data['reports']=ReportsModel::with(['getReportLicenses','getReportFaq','getReportmarketgraph','getReportmarketsharegraph','getReportSegmentgraph','getReportRegiongraph','getCategoryName','getSubCategoryName','getReportCAGR','getReportTblSummary'])->where('status','1')->where('url',$id)->first();
        $data['whyusData']=WhyChooseUsModel::select(['heading','content'])->get();
        $data['contactData']=ContactDetailsModel::select(['no_prefix','contact_no','email_address','facebook','twitter','instagram','linkedin'])->get();

        if(isset($data['reports']->id))
        {
            $marketshare=MarketShareGraphicalModel::select(['marketsharename','marketsharevalue'])
            ->where('report_id',$data['reports']->id)->limit(10)->get();
            $data['marketsharename'] =  $marketshare->pluck('marketsharename');
            $data['marketsharevalue'] =  $marketshare->pluck('marketsharevalue');


            $marketvalue=MarketGraphicalModel::select(['marketyear','marketvalue'])
            ->where('report_id',$data['reports']->id)->limit(10)->get();
            $data['marketyear'] =  $marketvalue->pluck('marketyear');
            $data['marketvalue'] =  $marketvalue->pluck('marketvalue');

            $regiongraph=RegionGraphicalModel::select(['regionname','regionvalue'])->where('report_id',$data['reports']->id)->limit(10)->get();
            $data['regionname'] =  $regiongraph->pluck('regionname');
            $data['regionvalue'] =  $regiongraph->pluck('regionvalue');

            $SegmentType=SegmentType::select(['id','report_id','segmenttypename'])->where('report_id',$data['reports']->id)->limit(10)->get();
            $data['SegmentType']=$SegmentType;
            return view('front.report',$data);
        }
        else
        {
            return view('errors.404');
        }

    }
    public function reports(Request $request)
    {
        if(isset($request->search))
        {
            $data['reports']=ReportsModel::latest('id')->with(['getSubCategoryName','getCategoryName'])
            ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
            ->where('heading', 'like', '%' . $request->search . '%')
            ->where('status','1')
            ->orderBy('id','desc')->paginate(10);
        }
        else
        {
            $id = $request->id ?? '';
            $data['reports']=ReportsModel::latest('id')->with(['getSubCategoryName','getCategoryName'])
                ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
                ->when(!empty($id),function ($query) use ($id) {
                    $query->whereHas('getCategoryName', function ($q) use ($id) {
                    $q->where('cat_name', 'like', '%' . $id . '%');
            });
                })
            ->where('status','1')->orderBy('id','desc')->paginate(10);
        }
        if($request->ajax())
        {
            return view('front.ajax.report',$data);
        }
        $data['ReportCategory']=ReportCategoryModel::with('getSubCategory')->select(['id','cat_name'])->get();
        $data['contactData']=ContactDetailsModel::select(['contact_no','email_address'])->first();
        return view('front.reports',$data);
    }

    public function reportcategory($id,Request $request)
    {
        $category=ReportCategoryModel::where('cat_name',removeslug($id))->first();
        if(isset($category))
        {
            $data['reports']=ReportsModel::latest('id')->with(['getSubCategoryName','getCategoryName'])
            ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
            ->where('category_id',$category->id)
            ->where('status','1')
            ->orderBy('id','desc')->paginate(10);
        }
        else
        {
            $data['reports']=ReportsModel::latest('id')->with(['getSubCategoryName','getCategoryName'])->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
            ->where('status','1')->orderBy('id','desc')->paginate(10);
        }
        
        $data['ReportCategory']=ReportCategoryModel::with('getSubCategory')->select(['id','cat_name'])->get();

        $data['contactData']=ContactDetailsModel::select(['contact_no','email_address'])->first();
        $data['category']=removeslug($id);
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
                ->where('status','1')
                ->where('category_id',removeslug($category->id))

                ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
                ->orderBy('id','desc')
                ->paginate(10);
            }
            else
            {
                $reports=ReportsModel::latest('id')
             ->with(['getSubCategoryName','getCategoryName'])
             ->where('status','1')
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
        ->where('status','1')
        ->where('sub_category_id',$subcategory->id)
        ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
        ->orderBy('id','desc')
        ->paginate(10);
        }
        else
        {
            $data['reports']=ReportsModel::latest('id')
            ->where('status','1')
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
                ->where('status','1')
                ->where('sub_category_id',$subcategory->id)
                ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
                ->orderBy('id','desc')
                ->paginate(10);
            }
            else
            {
                $reports=ReportsModel::latest('id')
                ->where('status','1')
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
            ->where('status','1')
             ->with(['getSubCategoryName','getCategoryName'])
             ->select(['id','category_id','heading','url','pages','publish_month','description','sub_category_id'])
             ->orderBy('id','desc')
             ->paginate(10);
            return view('front.ajax.report',compact('reports'));
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
        $data['contactData']=ContactDetailsModel::select(['address','no_prefix','contact_no','email_address'])->first();
        return view('front.contact',$data);
    }
    public function services()
    {
        $data['services']=ServicesModel::select(['id','heading','content','slug'])->latest('id')->get();
        return view('front.services',$data);
    }
    public function service($id,Request $request)
    {
        $data['services']=ServicesModel::select(['id','heading','content', 'slug'])->where('slug',$id)->first();
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
            

        ]);



        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()->all()]);

        }

        //$reportData=ReportsModel::find($request->report_id);
        $reportData=ReportsModel::select(['heading', 'url'])->find($request->report_id);
        $type = $request->types;
        $name = $request->name;
        $reportName=$reportData->heading;
        $reportUrl = URL::to('report/').'/'.$reportData->url;
        $email = $request->email;
        $country = $request->country;
        $contact_no = $request->contact_no;
        $organizations = $request->organizations;
        $others= $request->others;
        $input=$request->all();

        ReportEnquiryModel::create($input);



        $email = 'minhaj.khan@researchforetell.com';
        $useremail = $request->email;
        $adminemail = 'minhaj.khan@factviewresearch.com';
        $salesemail = 'sales@factviewresearch.com';

        Mail::to($useremail)->send(new MyReportEnquiry($type,$name,$reportName));
        Mail::to($adminemail)->send(new AdminReportEnquiry($type,$name, $reportName, $reportUrl, $email,$country, $contact_no, $organizations, $others));
        Mail::to($salesemail)->send(new AdminReportEnquiry($type,$name, $reportName, $reportUrl, $email,$country, $contact_no, $organizations, $others));
        return response()->json([ 'success'=> 'Form is successfully submitted!',
                                'id'=>$request->report_id]);
    }

    function enquirythankyou($id)
    {
        $reports=ReportsModel::latest('id')
             ->select(['id','heading','url'])->find($id);
        return view('front.thankyou',compact('reports'));
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
            return view('front.ajax.blog',compact('blogs'));
        }
    }

    public function blog($url,Request $request)
    {
        $data['blog']=Blog::select('*')->where('url',$url)->first();
        $data['recent_blog'] = Blog::where('url','!=',$url)->orderBy('id','desc')->first();
        $ids = [$data['blog']->id,$data['recent_blog']->id];
        $data['latest'] = Blog::whereNotIn('id',$ids)->limit(4)->get();
        return view('front.single-blog',$data);
    }


    public function pressreleases()
    {
        $data['press']=PressRelease::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->paginate(10);
        return view('front.press-release',$data);
    }
    public function fetch_press(Request $request)
    {
        if($request->ajax())
        {
            $press=PressRelease::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->paginate(10);
            return view('front.ajax.press-releases',compact('press'));
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
        return view('front.case-studies',$data);
    }
    public function fetch_case(Request $request)
    {
        if($request->ajax())
        {
            $case=CaseStudy::latest('id')->select(['id','heading','url','description','created_at','image','image_alt'])->paginate(10);
            return view('front.ajax.case-studies',compact('case'));
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
            'job_title' =>'required',
            // 'g-recaptcha-response' => 'required|captcha',
            // [
            //     'g-recaptcha-response.required' => 'You must check the reCAPTCHA.',
            //     'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
            // ]
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
        // Mail::to($email)->send(new AdminReportEnquiry($type,$name));
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
    public function pagenotfound()
    {
        return view('errors.404');
    }



    public function processPaypal(Request $request){

        $input=$request->all();
        $report_id=ReportPayment::create($input);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
 
        $response = $provider->createOrder([
         "intent" => "CAPTURE",
         "application_context" =>[
             "return_url" => route('processSuccess',$report_id->id),
             "cancel_url" => route('processCancel',$report_id->id),
             
         ],
         "purchase_units" =>[
             0 => [
                 "amount" => [
                     "currency_code" => "USD",
                     "value" => $request->lisence_amount, 
                 ]
             ]
         ]
                 ]);
         if(isset($response['id']) && $response['id']!=NULL)
         {
              foreach($response['links'] as $links)
              {
                 if($links['rel'] == 'approve')
                 {
                     return redirect()->away($links['href']);
                 }
              }
              return redirect()->route('createpaypal')
              ->with('error','Something went wrong');
         }
         else
         {
             return redirect()->route('createpaypal')
              ->with('error',$response['message']??'Something went wrong');
         }    
     }
 
     public function processSuccess($id,Request $request)
     {
         $provider = new PayPalClient;
         $provider->setApiCredentials(config('paypal'));
         $provider->getAccessToken();
 
         $response = $provider->capturePaymentOrder($request['token']);
         if(isset($response['status']) && $response['status']== 'COMPLETED')
         {
            $reports=ReportPayment::find($id);
            $reports->update(['status'=>'1']);
              return redirect()->route('payment-success',$id);
         }
         else
         {
            $reports=ReportPayment::find($id);
            $data['status']=0;
            $reports->update($data);
             return redirect()->route('processCancel',$id);
         } 
 
 
     }
 
     public function processCancel($id,Request $request)
     {
        $payment=ReportPayment::find($id);
        $reports=ReportsModel::latest('id')
        ->select(['id','heading'])->find($payment->report_id);
        return view('front.payment-cancel',compact('reports'));
 
     }
     public function paymentSuccess($id,Request $request)
     {
         
        $payment=ReportPayment::find($id);
        $reports=ReportsModel::latest('id')
        ->select(['id','heading'])->find($payment->report_id);
       return view('front.payment-success',compact('reports'));
 
     }


    public function allcategory()
    {
        $data['category']= ReportCategoryModel::select(['id','cat_name'])->get();
        return view('front.all-category',$data);
    }
}
