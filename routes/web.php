<?php


use App\Http\Controllers\EnquiryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AudioVideoController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContactDetailsController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GetInTouchController;
use App\Http\Controllers\HomePageSliderController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\PressReleaseController;
use App\Http\Controllers\ReportCategoryController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\WhyChooseUsController;
use App\Http\Controllers\WhoWeAreController;
use App\Http\Controllers\ReportSubCategoryController;
use Illuminate\Support\Facades\Auth;



//Website Routes
Route::get('/', [FrontController::class, 'home'])->name('front.home');
Route::match(['GET', 'POST'], '/report/{id}', [FrontController::class, 'report'])->name('front.report');
Route::match(['GET', 'POST'], '/enquiry/{id}/{type}', [FrontController::class, 'enquiry'])->name('front.enquiry');

Route::get('/all-reports', [FrontController::class, 'reports'])->name('front.reports');

Route::get('/fetch_datas', [FrontController::class, 'fetch_datas'])->name('front.fetch_datas');

Route::get('/report-category/{id}', [FrontController::class, 'reportcategory'])->name('front.reportcategory');
Route::get('/report-category/fetchcategory_data/{id}', [FrontController::class, 'fetchcategory_data'])->name('front.fetchcategory_data');


Route::get('/reportsubcategory/{id}', [FrontController::class, 'reportsubcategory'])->name('front.reportsubcategory');
Route::get('/reportsubcategory/fetchsubcategory_data/{id}', [FrontController::class, 'fetchsubcategory_data'])->name('front.fetchsubcategory_data');

Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/who-we-are', [FrontController::class, 'whowe'])->name('front.whowe');
Route::get('/why-chooose-us', [FrontController::class, 'whyus'])->name('front.whyus');
Route::get('/partners', [FrontController::class, 'partners'])->name('front.partners');
Route::get('/clienttestimonials', [FrontController::class, 'testimonials'])->name('front.testimonials');
Route::get('/services', [FrontController::class, 'services'])->name('front.services');
Route::get('/service/{id}', [FrontController::class, 'service'])->name('front.service-single');
Route::get('/contact-us', [FrontController::class, 'contact'])->name('front.contact');
Route::get('/form', [FrontController::class, 'form'])->name('front.form');
Route::post('/submit-enquiry', [FrontController::class, 'storeenquiry'])->name('submit.enquiry');
Route::post('/submit-contact-enquiry', [FrontController::class, 'storecontact'])->name('submit.contact_enquiry');
Route::get('/thankyou/{id}', [FrontController::class, 'enquirythankyou'])->name('front.thankyou');
Route::get('/buynow/{id}', [FrontController::class, 'buynow'])->name('front.buynow');
Route::post('/submit-buynow', [FrontController::class, 'storebuynow'])->name('submit.buynow');

//Blog Routes
Route::get('/all-blogs', [FrontController::class, 'blogs'])->name('front.blogs');
Route::get('/fetch_blogs', [FrontController::class, 'fetch_blogs'])->name('front.fetch_blogs');
Route::get('/blog/{url}', [FrontController::class, 'blog'])->name('front.blog');


/*********************** Press Releases Routes******************************/
Route::get('/all-press-releases', [FrontController::class, 'pressreleases'])->name('front.press-releases');
Route::get('/fetch_press', [FrontController::class, 'fetch_press'])->name('front.fetch_press');
Route::get('/press-release/{url}', [FrontController::class, 'press'])->name('front.press');


/*********************** Case Studies Front Routes******************************/
Route::get('/all-case-studies', [FrontController::class, 'casestudies'])->name('front.case-studies');
Route::get('/fetch_case', [FrontController::class, 'fetch_case'])->name('front.fetch_case');
Route::get('/case-study/{url}', [FrontController::class, 'casestudydetails'])->name('front.case-study');


Route::get('/reload-captcha', [FrontController::class, 'reloadCaptcha']);
Route::get('/reload-from-captcha', [FrontController::class, 'reloadformCaptcha'])->name('reload-from-captcha');

Route::get('/privacy-policy', [FrontController::class, 'privacypolicy'])->name('front.privacy-policy');
Route::get('/refund', [FrontController::class, 'refund'])->name('front.refund');
Route::get('/terms', [FrontController::class, 'terms'])->name('front.terms');
Route::get('/disclaimer', [FrontController::class, 'disclaimer'])->name('front.disclaimer');


Auth::routes();

//Route::get('/adminlogin',[AdminController::class],'login')->name('login');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/signOut', [AdminController::class, 'signOut'])->name('signOut');

    Route::group(['prefix' => 'admin'], function () {

        Route::get('users/list', [UserController::class, 'list']);
        Route::post('users/delete/{id}', [UserController::class, 'destroy']);


        // user roles
        Route::get('roles/list', [RoleController::class, 'list']);
        Route::post('roles/delete/{id}', [RoleController::class, 'destroy']);
        // slider routes
        Route::group(['prefix' => 'slider'], function () {
            Route::get('/', [HomePageSliderController::class, 'index']);
            Route::get('/list', [HomePageSliderController::class, 'list']);
            Route::get('/add', [HomePageSliderController::class, 'add'])->name('admin.slider.add');
            Route::post('/submit', [HomePageSliderController::class, 'submit']);
            Route::get('/edit/{id}', [HomePageSliderController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [HomePageSliderController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [HomePageSliderController::class, 'delete']);
        });


        Route::group(['prefix' => 'aboutus'], function () {
            Route::get('/', [AboutUsController::class, 'index']);
            Route::get('/list', [AboutUsController::class, 'list']);
            Route::get('/add', [AboutUsController::class, 'add'])->name('admin.aboutus.add');
            Route::post('/submit', [AboutUsController::class, 'submit']);
            Route::get('/edit/{id}', [AboutUsController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [AboutUsController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [AboutUsController::class, 'delete']);
        });

        Route::group(['prefix' => 'services'], function () {
            Route::get('/', [ServicesController::class, 'index']);
            Route::get('/list', [ServicesController::class, 'list']);
            Route::get('/add', [ServicesController::class, 'add'])->name('admin.services.add');
            Route::post('/submit', [ServicesController::class, 'submit']);
            Route::get('/edit/{id}', [ServicesController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [ServicesController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [ServicesController::class, 'delete']);
        });

        Route::group(['prefix' => 'whychoose'], function () {
            Route::get('/', [WhyChooseUsController::class, 'index']);
            Route::get('/list', [WhyChooseUsController::class, 'list']);
            Route::get('/add', [WhyChooseUsController::class, 'add'])->name('admin.whychoose.add');
            Route::post('/submit', [WhyChooseUsController::class, 'submit']);
            Route::get('/edit/{id}', [WhyChooseUsController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [WhyChooseUsController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [WhyChooseUsController::class, 'delete']);
        });

        Route::group(['prefix' => 'whowe'], function () {
            Route::get('/', [WhoWeAreController::class, 'index']);
            Route::get('/list', [WhoWeAreController::class, 'list']);
            Route::get('/add', [WhoWeAreController::class, 'add'])->name('admin.whowe.add');
            Route::post('/submit', [WhoWeAreController::class, 'submit']);
            Route::get('/edit/{id}', [WhoWeAreController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [WhoWeAreController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [WhoWeAreController::class, 'delete']);
        });

        Route::group(['prefix' => 'getintouch'], function () {
            Route::get('/', [GetInTouchController::class, 'index']);
            Route::get('/list', [GetInTouchController::class, 'list']);
            Route::get('/add', [GetInTouchController::class, 'add'])->name('admin.getintouch.add');
            Route::post('/submit', [GetInTouchController::class, 'submit']);
            Route::get('/edit/{id}', [GetInTouchController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [GetInTouchController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [GetInTouchController::class, 'delete']);
        });

        Route::group(['prefix' => 'clients'], function () {
            Route::get('/', [ClientsController::class, 'index']);
            Route::get('/list', [ClientsController::class, 'list']);
            Route::get('/add', [ClientsController::class, 'add'])->name('admin.clients.add');
            Route::post('/submit', [ClientsController::class, 'submit']);
            Route::get('/edit/{id}', [ClientsController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [ClientsController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [ClientsController::class, 'delete']);
        });

        Route::group(['prefix' => 'testimonials'], function () {
            Route::get('/', [TestimonialController::class, 'index']);
            Route::get('/list', [TestimonialController::class, 'list']);
            Route::get('/add', [TestimonialController::class, 'add'])->name('admin.testimonials.add');
            Route::post('/submit', [TestimonialController::class, 'submit']);
            Route::get('/edit/{id}', [TestimonialController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [TestimonialController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [TestimonialController::class, 'delete']);
        });

        Route::group(['prefix' => 'careers'], function () {
            Route::get('/', [CareersController::class, 'index']);
            Route::get('/list', [CareersController::class, 'list']);
            Route::get('/add', [CareersController::class, 'add'])->name('admin.careers.add');
            Route::post('/submit', [CareersController::class, 'submit']);
            Route::get('/edit/{id}', [CareersController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [CareersController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [CareersController::class, 'delete']);
        });
        Route::group(['prefix' => 'contactdetails'], function () {
            Route::get('/', [ContactDetailsController::class, 'index']);
            Route::get('/list', [ContactDetailsController::class, 'list']);
            Route::get('/add', [ContactDetailsController::class, 'add'])->name('admin.contactdetails.add');
            Route::post('/submit', [ContactDetailsController::class, 'submit']);
            Route::get('/edit/{id}', [ContactDetailsController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [ContactDetailsController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [ContactDetailsController::class, 'delete']);
        });

        /*************************Report Category ****************************/
        Route::group(['prefix' => 'reportcategory'], function () {
            Route::get('/', [ReportCategoryController::class, 'index'])->name('report.category.index');
            Route::get('/list', [ReportCategoryController::class, 'list']);
            Route::get('/add', [ReportCategoryController::class, 'add'])->name('admin.reportcategory.add');
            Route::post('/submit', [ReportCategoryController::class, 'submit']);
            Route::get('/edit/{id}', [ReportCategoryController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [ReportCategoryController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [ReportCategoryController::class, 'delete']);
        });

        /*************************Report Sub Category ****************************/
        Route::group(['prefix' => 'reportsubcategory'], function () {
            Route::get('/', [ReportSubCategoryController::class, 'index'])->name('report.subcategory.index');
            Route::get('/list', [ReportSubCategoryController::class, 'list']);
            Route::get('/add', [ReportSubCategoryController::class, 'add'])->name('admin.reportsubcategory.add');
            Route::post('/submit', [ReportSubCategoryController::class, 'submit']);
            Route::get('/edit/{id}', [ReportSubCategoryController::class, 'edit']);
            Route::post('/getSubCategory', [ReportSubCategoryController::class, 'getSubCategory']);
            Route::match(['GET', 'POST'], '/update/{id}', [ReportSubCategoryController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [ReportSubCategoryController::class, 'delete']);
        });

        Route::group(['prefix' => 'reports'], function () {
            Route::get('/', [ReportsController::class, 'index']);
            Route::get('/list', [ReportsController::class, 'list']);
            Route::get('/add', [ReportsController::class, 'add'])->name('admin.reports.add');
            Route::post('/submit', [ReportsController::class, 'submit']);
            Route::post('/getSlug', [ReportsController::class, 'getSlug']);
            Route::get('/edit/{id}', [ReportsController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [ReportsController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [ReportsController::class, 'delete']);
            Route::get('/export', [ReportsController::class, 'export']);

            Route::get('bulk-upload', [ReportsController::class, 'bulkUpload']);
            Route::post('reportContentImports', [ReportsController::class, 'reportContentImports']);
            Route::post('reportFaqImports', [ReportsController::class, 'reportFaqImports']);
            Route::post('marketValueImports', [ReportsController::class, 'marketValueImports']);
            Route::post('seoImports', [ReportsController::class, 'seoImports']);
            Route::post('SegmentImports', [ReportsController::class, 'SegmentImports']);

        });

        /****************************** Enquiry ******************/
        Route::group(['prefix' => 'enquiry'], function () {
            Route::get('/', [EnquiryController::class, 'index']);
            Route::get('/list', [EnquiryController::class, 'enquiry']);
            Route::get('/request', [EnquiryController::class, 'reportRequest']);
            Route::get('/discount', [EnquiryController::class, 'reportDiscount']);
            Route::match(['GET', 'POST'], '/delete/{id}', [EnquiryController::class, 'delete']);

            Route::get('/contact', [EnquiryController::class, 'contact']);
            Route::match(['GET', 'POST'], '/deletecontact/{id}', [EnquiryController::class, 'deletecontact']);

        });


        /*******************Blog category Route****************************/
        Route::group(['prefix' => 'blog-category'], function () {
            Route::get('/', [BlogCategoryController::class, 'index'])->name('report.blog-category.index');
            Route::get('/list', [BlogCategoryController::class, 'list']);
            Route::get('/add', [BlogCategoryController::class, 'add'])->name('admin.blog-category.add');
            Route::post('/submit', [BlogCategoryController::class, 'submit']);
            Route::get('/edit/{id}', [BlogCategoryController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [BlogCategoryController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [BlogCategoryController::class, 'delete']);
        });


        /*******************Blogs Route****************************/
        Route::group(['prefix' => 'admin-blogs'], function () {
            Route::get('/', [BlogController::class, 'index'])->name('report.admin-blogs.index');
            Route::get('/list', [BlogController::class, 'list']);
            Route::get('/add', [BlogController::class, 'add'])->name('admin.admin-blogs.add');
            Route::post('/submit', [BlogController::class, 'submit']);
            Route::get('/edit/{id}', [BlogController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [BlogController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [BlogController::class, 'delete']);
        });

        /*******************Press Releases Route****************************/
        Route::group(['prefix' => 'admin-press-releases'], function () {
            Route::get('/', [PressReleaseController::class, 'index'])->name('report.admin-press-releases.index');
            Route::get('/list', [PressReleaseController::class, 'list']);
            Route::get('/add', [PressReleaseController::class, 'add'])->name('admin.admin-press-releases.add');
            Route::post('/submit', [PressReleaseController::class, 'submit']);
            Route::get('/edit/{id}', [PressReleaseController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [PressReleaseController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [PressReleaseController::class, 'delete']);
        });

        /*******************Case Studies Route****************************/
        Route::group(['prefix' => 'admin-case-studies'], function () {
            Route::get('/', [CaseStudyController::class, 'index'])->name('report.admin-case-studies.index');
            Route::get('/list', [CaseStudyController::class, 'list']);
            Route::get('/add', [CaseStudyController::class, 'add'])->name('admin.admin-case-studies.add');
            Route::post('/submit', [CaseStudyController::class, 'submit']);
            Route::get('/edit/{id}', [CaseStudyController::class, 'edit']);
            Route::match(['GET', 'POST'], '/update/{id}', [CaseStudyController::class, 'update']);
            Route::match(['GET', 'POST'], '/delete/{id}', [CaseStudyController::class, 'delete']);
        });

        // Payment Details
        Route::group(['prefix' => 'order-history'], function () {
            Route::get('/', [OrderHistoryController::class, 'index'])->name('report.payment');
            Route::get('/list', [OrderHistoryController::class, 'list'])->name('report.payment.list');
        });


         /***********************Audio Video Route *****************/
         Route::group(['prefix'=>'audio-video'],function(){
            Route::get('/',[AudioVideoController::class,'index'])->name('report.audio-video.index');
            Route::get('/list',[AudioVideoController::class,'list']);
            Route::get('/add',[AudioVideoController::class,'add'])->name('admin.audio-video.add');
            Route::post('/submit',[AudioVideoController::class,'submit']);
            Route::get('/edit/{id}',[AudioVideoController::class,'edit']);
            Route::match(['GET','POST'],'/update/{id}',[AudioVideoController::class,'update']);
            Route::match(['GET','POST'],'/delete/{id}',[AudioVideoController::class,'delete']);
        });


    });
});
