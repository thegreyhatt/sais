<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
}
