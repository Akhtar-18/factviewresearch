<?php
// app/Http/Controllers/RobotsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class RobotsController extends Controller
{
    public function index()
    {
        $content = $this->generateRobotsContent();
        return response($content)->header('Content-Type', 'text/plain');
    }

    private function generateRobotsContent()
    {
        // Your dynamic logic to generate content
        $disallowPrivate = true;

        $robotsContent = "User-agent: *\n";

        if ($disallowPrivate) {
            $robotsContent .= "Disallow: /private/\n";
        }

        // Add more rules as needed

        return $robotsContent;
    }
}
?>
