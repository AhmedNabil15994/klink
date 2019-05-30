<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Frontend\employment;

class EmploymentController extends Controller
{
    public function newEmployment()
    {
        return request()->all();
    }
}
