<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $result = [];
        // dd("text");  
        $data = $request->input('data_name');
        // $data = 'cars moto';
        $baseUrl = 'https://openverse.org/search/?q=';
        // $pattern = '/src=["\'](?!.*\.js)(.*?)["\']/i';
        $pattern = '/<img[^>]+src="([^">]+)"/i';

        $words = explode(' ', $data);
        foreach ($words as $word) {
            $concatenatedUrl = $baseUrl . $word;
            $htmlContent = file_get_contents($concatenatedUrl);
            if (preg_match_all($pattern, $htmlContent, $matches)) {
                shuffle($matches[1]);
                $firstFiveUrls = array_slice($matches[1], 0, 5);

                foreach ($firstFiveUrls as $imageUrl) {
                    $result[$word][] = $imageUrl;
                    // echo '<img src="' . $imageUrl . '" width=400px height=200px>';
                }
            } else {
                echo "No image URLs found.";
            }

        }

        echo json_encode($result);

    }

}