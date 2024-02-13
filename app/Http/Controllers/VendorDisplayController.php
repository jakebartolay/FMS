<?php

namespace App\Http\Controllers;

use App\Models\vendorInfo;
use Illuminate\Http\Request;

class VendorDisplayController extends Controller
{
    public function show()
    {
    $data = vendorInfo::all();

    return view('sidebar.vendormanagement', compact('data'));
    }
}