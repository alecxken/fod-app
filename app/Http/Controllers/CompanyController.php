<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Company;

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

      public function  company()
	    {
            $faculties = Company::query();

            return Datatables::of($faculties)->addColumn('action', function ($faculties) {

            return '<div class="btn-group" role="group" aria-label="Basic example">
                       <button id="getEditProductData" class="btn btn-xs btn-success  label-sm  open-modalss" value="'.$faculties->id.'"><i class="fa fa-pencil"></i></button>
                        <a href="/delete-ngo/'.$faculties->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>
                        <button type="button" class="btn btn-primary"><i class="fa fa-eye"></i> </button>
                    </div>';
        })->make(true);
	    }

	    public function store(Request $Request)
	    {
	    	
	    }
}
