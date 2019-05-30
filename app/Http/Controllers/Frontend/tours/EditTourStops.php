<?php

namespace App\Http\Controllers\Frontend\tours;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Bodunde\GoogleGeocoder\Geocoder;

class EditTourStops extends editTourController
{
    
    //
//     public function index()
//     {
//         $geocoder = new Geocoder();
//         $location1 = [
//             "lat" => 6.5349646,
//             "lng" => 3.3892894
//           ];
        
//         $location2 = [
//             "lat" => 6.601838,
//             "lng" => 3.3514863
//           ];
//         $distance = $geocoder->getDistanceBetween($location1, $location2);
//         return $this->GetDrivingDistance(6.5349646,3.3892894,6.601838,3.3514863);
//         return $distance;
//     }
//     public function GetDrivingDistance($lat1,  $long1,$lat2,$long2)
// {
//     $url = "https://maps.googleapis.com/maps/api/distancematrix/json?";
//     $url = $url."origins=".$lat1.",".$long1;
//     $url = $url."&destinations=".$lat2.",".$long2;
//     $url = $url."&waypoints=[6.0449646,3.3892894]&optimizeWaypoints=true";
//     $url = $url."&mode=driving&key=".env('GOOGLE_MAPS_API_KEY');
    
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//     curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//     $response = curl_exec($ch);
//     curl_close($ch);
//     $response_a = json_decode($response, true);
//     return [$response_a,$url];
//     try{

//         $dist = $response_a['rows'][0]['elements'][0]['distance']['value'];
//         $time = $response_a['rows'][0]['elements'][0]['duration']['value'];
//     }catch(\ErrorException $e){
//         return ['distance'=>0,'time'=>0];
//     }
    
//     return array('distance' => $dist, 'time' => $time);
// }
}
