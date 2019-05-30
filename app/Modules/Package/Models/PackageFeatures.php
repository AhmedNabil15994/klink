<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageFeatures extends Model {

    protected $table = 'package_features';
    protected $primary_key = 'id';
    public $timestamps = false;
    protected $fillable = ['feature_id','package_id','value','bool_value'];


    function feature() {
        return self::belongsTo('App\Models\Feature', 'feature_id', 'id');
    }

    static function getPackageFeatures($id) {
        $dataList = self::where('package_id', $id)
            ->with('feature')
            ->get();

        $list = [];
        foreach ($dataList as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key]->id = $value->id;
            $list[$key]->title = $value->feature->title;
            $list[$key]->feature_id = $value->feature->id;
            $list[$key]->type = $value->feature->type;
            $list[$key]->value = $value->value != null ? $value->value : ($value->bool_value == 1 ? "Yes" : "No");        }

        return $list;
    }

}
