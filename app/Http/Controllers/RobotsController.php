<?php
// app/Http/Controllers/RobotsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class RobotsController extends Controller
{
    public function index()
    {
        $content = "User-agent: *
        \nDisallow: /private/
        \nAllow: /public/
        \nSitemap: https://factviewresearch.com/sitemap.xml"; // Default robots.txt content

        return response($content)->header('Content-Type', 'text/plain');
    }
}
?>
