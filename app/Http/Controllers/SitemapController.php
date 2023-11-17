<?php
// app/Http/Controllers/SitemapController.php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Spatie\Sitemap\SitemapGenerator;

class SitemapController extends Controller
{
    public function generate()
    {
        SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));

        return response()->view('sitemap')->header('Content-Type', 'text/xml');
    }
}

?>
