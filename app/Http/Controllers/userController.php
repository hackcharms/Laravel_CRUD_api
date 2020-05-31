<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function index($var = null)
    {
        // DB::insert('insert into users (email,name,password)values(?,?,?)',['zaa78692@gmail.com','zubbu','ansari']);
    }
}
