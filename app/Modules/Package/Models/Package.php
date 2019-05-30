<?php

namespace App\Models;

use \App\Models\PackageFeatures;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    protected $primary_key = 'id';
    public $timestamps = false;

    static function generatePackage($source){
        $packageObj = new \stdClass();
        $packageObj->id = $source->id;
        $packageObj->title = $source->title;
        $packageObj->price = $source->price;
        $packageObj->monthly_price = $source->monthly_price;
        $packageObj->discount = $source->discount;
        $packageObj->features = PackageFeatures::getPackageFeatures($source->id);
        $packageObj->coupon = $source->coupon;
        $packageObj->is_active = $source->is_active == 1 ? "Yes" : "No";
        return $packageObj;
    }

    static function generatePackageFeatures($source)
    {
        $list = [];
        foreach($source->features as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value);
        }
        return $list;
    }
}
