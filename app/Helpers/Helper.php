<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Carbon;
use App\Models\Frontend\Number;
use App\Models\Frontend\Address;
use App\Models\Frontend\Email;
use Illuminate\Pagination\LengthAwarePaginator;


class Helper
{
    public static function convert($string)
    {
        return Carbon::parse($string)->format('Y-m-d');
    }

    public static function convert2($string)
    {
        if($string != '' || $string != null){
            return Carbon::parse($string)->format('Y-m-d H:i');
        }else{
            return '';
        }
    }

    public static function type($status)
    {
        $data = '';
        if ($status == 'Driver') {
            $data = 'user3';
        } elseif ($status == 'User') {
            $data = 'user2';
        } elseif ($status == 'Company') {
            $data = 'user';
        }

        return $data;
    }
    
    public static function convNum($string)
    {
        $data = str_replace('.', ',', $string);

        return $data;
    }

    // before using
    // Model will describe Model Name But will be addes in this form 
    // \Number   or   \Address or \Phone
    // record represent unique record that we look for 
    // ex mobile_number in Number Model
    // Data your data that you want to insert
    // 
    public static function storeNewRecord($model,$record,$data){
        $full_model = '\App\Models\Frontend'.$model;
        $row = $full_model::where($record,$data[$record])->first();

        if($row){
            return $row->id;
        }else{
            $newRow = $full_model::create($data);
            return $newRow->id;
        }
    }



    public static function paginateData($data, $perPage,$request){

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($data);
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
        $paginatedItems->setPath($request->url());

        return $paginatedItems;
    } 


}
