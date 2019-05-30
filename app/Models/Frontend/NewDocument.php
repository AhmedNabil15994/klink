<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class NewDocument extends Model
{

	protected $table = 'new_documents';
    public $timestamps = true;
    protected $fillable = ['name','layout','description','image','document_type_id'];


    public function document_type(){
    	return $this->hasOne('App\Models\Frontend\DocumentType','id','document_type_id');
    }

    public function Pages(){
    	return $this->hasOne('App\Models\Pages','id','page_id');
    }

    static function getDisplayFor($source){
    	$types = [
                    [
                        'id' => '1',
                        'title' => 'Super Admin',
                        'value' => 'super_admin',
                    ],
                    [
                        'id' => '2',
                        'title' => 'Sub Domain',
                        'value' => 'sub_domain',
                    ],
                    [
                        'id' => '3',
                        'title' => 'User',
                        'value' => 'user',
                    ],
                    [
                        'id' => '4',
                        'title' => 'Company',
                        'value' => 'company',
                    ],
                    [
                        'id' => '5',
                        'title' => 'Driver',
                        'value' => 'driver',
                    ],
                    [
                        'id' => '6',
                        'title' => 'Business Customer',
                        'value' => 'business_customer',
                    ],
        ];
    	
    	$results = array_filter($types, function ($var) use($source) {
                    return ($var['id'] == $source);
                });
    	$results = array_values($results);
        return !empty($results[0]) ? $results[0]['title'] : '';
    }

}
