<?php

namespace App\Http\Controllers;

use App\Models\vm;
use Illuminate\Http\Request;

class VendorDisplayController extends Controller
{
    public function show()
    {
    $data = vm::all();

    return view('sidebar.vendormanagement', compact('data'));
    }
}