<?php

namespace App\Models\Backend;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','display_name',
    ];
	
}