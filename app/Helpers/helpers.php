<?php
use App\Models\ClientsModel;
use App\Models\ContactDetailsModel;
use App\Models\HomeSliderModel;
use App\Models\ReportCategoryModel;
use App\Models\ServicesModel;
use App\Models\TestimonialModel;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

if (! function_exists('nameByPermisson')) {
    function nameByPermisson($Name)
    {
        $permissions = Permission::select(['name'])->where(['per_name'=>$Name])->get();
        return $permissions;
    }
}

if (! function_exists('GetSlider')) {
    function GetSlider()
    {
        $getSliderData = HomeSliderModel::select(['heading','subheading','content','slider_image'])->get();
        return $getSliderData;
    }
}

if (! function_exists('getTestimonial')) {
    function getTestimonial()
    {
        $getTesminialData = TestimonialModel::select(['heading','content'])->get();
        return $getTesminialData;
    }
}
if (! function_exists('getClient')) {
    function getClient()
    {
        $getClientData = ClientsModel::select(['image'])->get();
        return $getClientData;
    }
}


if (! function_exists('GetReportMenu')) {
    function GetReportMenu()
    {
        $getReportMenuData = ReportCategoryModel::with('getSubCategory')->select(['id','cat_name'])->get();
        return $getReportMenuData;
    }
}

if (! function_exists('GetServiceMenu')) {
    function GetServiceMenu()
    {
        $getServiceMenuData = ServicesModel::select(['id','heading'])->get();
        return $getServiceMenuData;
    }
}



if (! function_exists('ImageUpload')) {
    function ImageUpload($path,$image)
    {
            $destinationPath = public_path('/').$path;
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
        return $postImage;
    }
}

if (! function_exists('getCompanyDetail')) {
    function getCompanyDetail()
    {
        $getCompanyDetailData = ContactDetailsModel::select(['company_name','address','contact_no','email_address','facebook','twitter','instagram','linkedin','company_logo'])->first();
        return $getCompanyDetailData;
    }
}

if (! function_exists('wordLimit')) {
    function wordLimit($description)
    {
        $limit=Str::words($description, 50, '...');
        return $limit;
    }
}
?>
