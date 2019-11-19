<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function show()
    {
        return view('Home.register');
    }
}