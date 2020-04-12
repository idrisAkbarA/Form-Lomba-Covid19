<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clear extends Controller
{
    public function clear(){
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        return "Cache is cleared";
    }
}