<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class LanguageFiles extends Model
{
    //
    protected $fillable = ['name','shortcut','is_active','is_main','image'];
}
