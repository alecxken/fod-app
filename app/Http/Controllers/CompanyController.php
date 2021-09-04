<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Auth;

use Yajra\Datatables\Datatables;

use Token;

class CompanyController extends Controller
{
    //
    public function create()
    {
    	return back('company.index');
    }
}
