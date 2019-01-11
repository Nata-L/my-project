<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function curlGet ()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://makeup.com.ua/product/119159/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $data = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            print_r(json_decode($data));
        }

        preg_match('(<span class="rus">([\w.]*))', $data, $out);
        dd($out[1]);
        return $data;

        dd($data);
    }

    public function searchPart ($originNumber) 
    {
        $request = ("https://maxi.ecat.ua/products/search/$originNumber/type:article+customerNo:none");
        $response = preg_match_all ();
        return $response;
    }


    /*
    public function test()
    {
        //$request = file_get_contents('https://panama.ua/product/346111/');
         $request = file_get_contents('https://maxi.ecat.ua/products/search/7700274177/type:article+customerNo:none');
        //preg_match_all('(<div class="product__price">([\w.]*))', $request, $out, PREG_PATTERN_ORDER); 
        //dd($out[1][0]);
        //dd($request);
        echo $request;
    }
    */

    /*
    public function show ($id)
    { 
        // echo __METHOD__;
        echo $id;
    }
    */
}
