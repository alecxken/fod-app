<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

  use App\Models\User;

use Auth;

use Yajra\Datatables\Datatables;

use Token;

use App\Models\FoodBank;

use App\Models\SiteDropdown;

use App\Models\Donation;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

use App\Notifications\NewUserAlert;


use Illuminate\Support\Facades\Hash;

use DB;



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

         $content = FoodBank::paginate(8);

        return view('ourpartner',compact('dropdowns','token','users','content'));
    }

      public function getdonations()
    {

        $data = Donation::all();

        return view('company.donations'); 
    }

       public function getdonationsa($id)
    {

        $data = Donation::all()->where('id',$id)->first();

        return  $data;

        return view('company.donations',compact('data')); 
    }

       public function  donationa()
        {
            $faculties = Donation::query();
            return Datatables::of($faculties)->addColumn('action', function ($faculties) {

                if ($faculties->status == 'Received') 
                {
                  return 'N/A';
                }
                else
                {
                     return '<div class="btn-group" role="group" aria-label="Basic example">
                       <button id="getEditProductData" class="btn btn-xs btn-success  label-sm  open-modalss" value="'.$faculties->id.'"><i class="fa fa-eye"></i></button>  </div>';
                        
                   }

                    })->make(true);
                
           
        }


               public function  getreportdonors()
        {
            return view('company.report');
        }


               public function  reports()
        {
            $faculties = Donation::query();
            return Datatables::of($faculties)->addColumn('action', function ($faculties) {

                if ($faculties->status == 'Received') 
                {
                  return 'N/A';
                }
                else
                {
                     return '<div class="btn-group" role="group" aria-label="Basic example">
                       <button id="getEditProductData" class="btn btn-xs btn-success  label-sm  open-modalss" value="'.$faculties->id.'"><i class="fa fa-eye"></i></button>  </div>';
                        
                   }

                    })->make(true);
                
           
        }

         public function updatedonations(Request $request)
        {

            $id = Donation::all()->where('token',$request->input('token'))->first();

            if (empty($id)) {
                return back()->with('danger','Not Found');
            }

            $COMPANY = Donation::findorfail($id->id);

            $COMPANY->status = $request->input('status');

            $COMPANY->save();

            return back()->with('status','Successful');

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

    public function getfoodbank($id)
    {
      $data = FoodBank::all()->where('id',$id)->first();

      return $data;
    }

     public function getpostreport(Request $request)
        {

             $from = $request->input('from');

             $to = $request->input('to');

             $status = $request->input('status');

             $data = Donation::query();

              if (!empty($from) &&  !empty($to))
               {
                   $data = $data->where('donation_date','>=',$from)->where('donation_date','<=',$to);
               }

             if (!empty($status))
              {
                $data = $data->where('status',$status);;
              }

              $data = $data->get();
            // $data = FoodBank::all()->where('name' ,'LIKE','%'.$request->input('name').'%')->where('location', $request->input('location'))->first();
             return view('company.report',compact('data'));
        }


      public function storefood(Request $request)
        {

             $name = $request->input('name');

             $location = $request->input('location');

             $content = FoodBank::query();

             if (!empty($name))
              {
                $content = $content->where('name' ,'LIKE','%'.$name.'%');
              }

              if (!empty($location))
               {
                   $content = $content->where('location',$location);
              }

              $content = $content->paginate(5);



            $dropdowns = SiteDropdown::all();

             $token = Token::Unique('food_banks','token',5);

             $t = date("Y-M",strtotime("now"));

             $token = strtoupper('NGO-'.$token.''.$t); 

             $users = User::all();

            // $data = FoodBank::all()->where('name' ,'LIKE','%'.$request->input('name').'%')->where('location', $request->input('location'))->first();
             return view('ourpartner',compact('dropdowns','token','users','content'));
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

        //data

         public function newdonationsfoodbanks(Request $request)
         {

           $dropdowns = SiteDropdown::all();

            $token = Token::Unique('donations','token',5);

            $t = date("Y-M",strtotime("now"));

            $token = strtoupper('DNR-'.$token.''.$t); 

            $check = User::where('email',$request->input('donor_email'))->first();


        if (empty($check))
         {
           
                 
          //Retreive all roles

            // dd('ff');

             ///de
            $user = new User();

            $user->name  = $request->input('donor_name');

            $user->email  = $request->input('donor_email');

            $user->password  = Hash::make('12345678');

            $user->save();
        
                 $rol = Role::where('name', '=', 'Donor')->first();
                 if(!empty($rol))
                 {
                     $user->assignRole($rol);
                 }

                

    $details = [
            'greeting' => 'Hi '.$request->input('donor_name'),
            'body' => 'Thank you for your donation. To view your donations sign in using your email address and 12345678 as your password',
            'thanks' => 'Thank you for visiting Foodbankek.org!',
    ];

    $user->notify(new \App\Notifications\NewUserAlert($details));
         }

         else

         {
            $user = $check;

         }

             //
            $data = new Donation();

            $data->token  = $token;

            $data->donor  = $request->input('donor_name');

            $data->food_bank  =  $request->input('food_bank');

            $data->description  = $request->input('description');

            $data->category  = $request->input('cooling');

            $data->donation_date  = $request->input('donation_date');

        //,    $data->comments  = $request->input('comments');

            $data->status  = 'New';

            $data->save();


            return redirect('our-partners')->with('status','Successfully donated to '.$request->input('food_bank').'');


        }

         public function newdonations(Request $request)
         {

           $dropdowns = SiteDropdown::all();

            $token = Token::Unique('donations','token',5);

            $t = date("Y-M",strtotime("now"));

            $token = strtoupper('DNR-'.$token.''.$t); 

            $food = FoodBank::select("*")
                        ->orderBy(DB::raw('RAND()'))
                        ->where('location',$request->input('location'))->first();

            $foodbank = $food->name;


        $check = User::where('email',$request->input('donor_email'))->first();


        if (empty($check))
         {
           
                 
          //Retreive all roles

            // dd('ff');

             ///de
            $user = new User();

            $user->name  = $request->input('donor_name');

            $user->email  = $request->input('donor_email');

            $user->password  = Hash::make('12345678');

            $user->save();
        
                 $rol = Role::where('name', '=', 'Donor')->first();
                 if(!empty($rol))
                 {
                     $user->assignRole($rol);
                 }

                

    $details = [
            'greeting' => 'Hi '.$request->input('donor_name'),
            'body' => 'Thank you for your donation. To view your donations sign in using your email address and 12345678 as your password',
            'thanks' => 'Thank you for visiting Foodbankek.org!',
    ];

    $user->notify(new \App\Notifications\NewUserAlert($details));
         }

         else

         {
            $user = $check;

         }

         

       

           //
            $data = new Donation();

            $data->token  = $token;

            $data->donor  = $user->name;

            $data->food_bank  = $foodbank;

            $data->description  = $request->input('description');

            $data->category  = $request->input('category');

            $data->donation_date  = $request->input('donation_date');

        //,    $data->comments  = $request->input('comments');

            $data->status  = 'New';

            $data->save();


            return back()->with('status','Successfully donated to '.$foodbank.'');
          
         }

         public function receivedonation($id)
         {

             $dropdowns = SiteDropdown::all();
$data = FoodBank::findorfail($id);
            return view('company.donates',compact('data','dropdowns'));
         }
        
}
