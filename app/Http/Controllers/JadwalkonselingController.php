<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalkonselingController extends Controller
{
    public function index (){
        return view("admin.jadwalkonseling");
    }
    //
}