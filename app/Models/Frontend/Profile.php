<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $timestamps = true;
    protected $fillable = array('user_id','location','region', 'first_name','last_name','company','phone','country','postal_code','address','district','home','about','info','address2','tax_no','secure_no','expire_date','home_phone','user_status_id','status','pin','is_admin','image','see_test');
    
    public $table ='user_profiles';
    public function save(array $options = array())
    {
        $name_equals = null;
        if (!is_null($name_equals)) {
            if ($name_equals === $this->name()) {
                return false;
            }
        }
        if ($this->exists) {
            return parent::save($options);
        } else {
            $query = $this->newQueryWithoutScopes();
            $saved = $this->performInsert($query, $options);
            if ($this->user) {
                if ($this->status == 'Company'||$this->status == 'company') {
                    \App\Models\Frontend\Driver::create([
                        'profile_id'=>$this->id,
                        'company_id'=>$this->user->id
                    ]);
                }
            }
            if ($saved) {
                $this->finishSave($options);
            }
            return $saved;
        }
       
        
        
        // Do great things...

         // Calls Default Save
    }
    public function User()
    {
        return $this->belongsTo('App\Models\Frontend\User');
    }
    public static function create($newprofile)
    {
        $model = static::query()->create($newprofile);
        if ($newprofile['status'] == 'Company') {
            \App\Models\Frontend\Driver::create([
                'profile_id'=>$model->id,
                'company_id'=>$model->user->id
            ]);
        }
        return $model;
    }
    public function name()
    {
        return $this->first_name.' '.$this->last_name;
    }
    public function code_town()
    {
        return $this->postal_code.' '.$this->district;
    }

    public function tour_company()
    {
        return $this->belongsTo('App\Models\Frontend\TourOffers', 'id', 'company_profile_id');
    }

    public function tour_driver()
    {
        return $this->belongsTo('App\Models\Frontend\TourOffers', 'id', 'driver_profile_id');
    }

    public function tour_company_profile()
    {
        return $this->belongsTo('App\Models\Frontend\Tour', 'id', 'profile_id_company');
    }

    public function taxes()
    {
        return $this->hasOne('App\Models\Frontend\AllTax', 'profile_id', 'id');
    }

    public function fullAddress()
    {
        $seperator = '';
        if ($this->street && $this->home) {
            $seperator = ', ';
        }
        return $this->street.' '.$this->home.$seperator.$this->postal_code.' '.$this->city.$seperator.$this->country;
    }
}
