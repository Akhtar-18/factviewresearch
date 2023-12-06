<?php
// app/Http/Controllers/SitemapController.php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CaseStudy;
use App\Models\PressRelease;
use App\Models\ReportCategoryModel;
use Illuminate\Http\Response;
use Spatie\Sitemap\SitemapGenerator;
use App\Models\ReportsModel;
use App\Models\ServicesModel;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    // public function generate()
    // {
    //     SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));

    //     return response()->view('sitemap')->header('Content-Type', 'text/xml');
    // }


    public function generate()
    {
       $pages=['/','about','who-we-are','why-chooose-us','refund','disclaimer','terms','privacy-policy','all-reports',
       'clienttestimonials','all-press-releases','all-case-studies','partners','all-blogs','contact-us'];

        $reports = ReportsModel::select('url','updated_at')->get(); 
        $reportsCategory = ReportCategoryModel::select('cat_name','updated_at')->get(); 
        $services = ServicesModel::select('slug','created_at')->get();
        $blogs = Blog::select('url','created_at')->get();
        $casestudies = CaseStudy::select('url','created_at')->get();
        $pressReleases = PressRelease::select('url','created_at')->get();

        return response()->view('front.sitemap', [
            'reports'           => $reports,
            'reportsCategory'   => $reportsCategory,
            'pages'             => $pages,
            'services'          => $services,
            'blogs'             => $blogs,
            'casestudies'       => $casestudies,
            'pressReleases'     => $pressReleases
        ])->header('Content-Type', 'text/xml');
    }
}

?>
