<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

  use App\Models\User;

use Auth;

use Yajra\Datatables\Datatables;

use Token;

use App\Models\FoodBank;

use App\Models\SiteDropdown;



class Foodbankcontroller extends Controller
{
    //

      public function partners()
    {
        $dropdowns = SiteDropdown::all();

         $token = Token::Unique('food_banks','token',5);

         $t = date("Y-M",strtotime("now"));

         $token = strtoupper('NGO-'.$token.''.$t); 

         $users = User::all();

         $content = FoodBank::paginate(5);

        return view('ourpartner',compact('dropdowns','token','users','content'));
    }

  public function index()
    {
        $dropdowns = SiteDropdown::all();

         $token = Token::Unique('food_banks','token',5);

         $t = date("Y-M",strtotime("now"));

         $token = strtoupper('NGO-'.$token.''.$t); 

         $users = User::all();

        return view('food.index',compact('dropdowns','token','users'));
    }

    

     public function  foodbank()
	    {
            $faculties = FoodBank::query();
        return Datatables::of($faculties)->addColumn('action', function ($faculties) {

            return '<div class="btn-group" role="group" aria-label="Basic example">
                       <button id="getEditProductData" class="btn btn-xs btn-success  label-sm  open-modalss" value="'.$faculties->id.'"><i class="fa fa-pencil"></i></button>
                        <a href="/drop-foodbank/'.$faculties->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>
                        <button type="button" class="btn btn-primary"><i class="fa fa-eye"></i> </button>
                    </div>';
        })->make(true);
	    }


        public function store(Request $request)
        {

         

            $COMPANY = new FoodBank();

            	$COMPANY->token = $request->input('token');

			$COMPANY->name = $request->input('name');

			 $COMPANY->slug = $request->input('name');

			$COMPANY->physical_address = $request->input('physical_address');

			$COMPANY->location = $request->input('location');

			$COMPANY->capacity = $request->input('capacity');

			$COMPANY->cooling = $request->input('cooling');

			$COMPANY->phone_number = $request->input('phone_number');

			$COMPANY->email = $request->input('email');

			$COMPANY->website = $request->input('website');

			 $media = $request->file('image');               

                          if($request->hasfile('image'))
                          {  
                                if (!empty($media))
                                 {
                                    $destinationPath = public_path('files');

                                    $filename = time().'.'.$media->getClientOriginalExtension();

                                    $media->move($destinationPath, $filename);

                                    $files = $filename;

                                   $COMPANY->image = $files;

                                  }
                                 
                             }


			$COMPANY->description = $request->input('description');

            $COMPANY->save();

            return back()->with('status','Successfully Registered  '. $request->input('name').' ');



        }

        public function drop_food_bank($id){
           
            $data = FoodBank::findorfail($id);

            $data->delete();

            return back()->with('danger','Successfully Dropped  '. $data->name.' ');

        }

         public function get_food_bank($id){
           
            $data = FoodBank::findorfail($id);

            return $data;

           
        }
}
