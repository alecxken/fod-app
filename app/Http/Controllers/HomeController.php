<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Charts\SampleChart;

use DB;

  use App\Models\User;

use App\Models\FoodBank;

use App\Models\SiteDropdown;

use App\Models\Donation;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $jobs = DB::table('order_masters')
                 ->select('status', DB::raw('count(*) as total'))
                 ->groupBy('status')
                 ->cursor();

               //return $jobs;
        $total_jobs = Donation::all()->count();

         $users = User::all()->count();

         $clients = FoodBank::all()->count();

        // $clients = Client::all()->count();

         $donations = Donation::all()->count();

         $newdonations = Donation::all()->where('status','New')->count();

         $receiveddonations = Donation::all()->where('status','Received')->count();

         $pendingddonations = Donation::all()->where('status','Pending')->count();

 

         $datas = '';

         try 
         {
                $jobs_labels = Donation::select(DB::raw("count(id) as count"),'status')->groupBy('status')->pluck('status');

                $jobs_count = Donation::select(DB::raw("count(id) as count"),'status')->groupBy('status')->pluck('count');

// dd($jobs_counts);
               

                $count = count($jobs_labels);

                for ($i=0; $i < $count; $i++) 
                { 
                    $color = substr(str_shuffle('ABCDEF0123456789'),0,6);

                    $colors[] = '#'.$color;
                    # code...
                }
                if (empty($colors)) {
                   $colors = '#FFF';
                }

                $datas  = new SampleChart;

                $datas->labels($jobs_labels);

                $datas->dataset('Quue Status Count','bar',$jobs_count)->backgroundColor($colors);

              //  $datas->dataset('Quue Status Count','bar',$jobs_counts)->backgroundColor($colors);
         }
         catch(\Illuminate\Database\QueryException $ex)
         {
                        $error = $ex->getMessage();
         }


            try 
         {
                $org_labels = Donation::select(DB::raw("count(id) as count"),'food_bank')->groupBy('food_bank')->pluck('food_bank');

                $org_count = Donation::select(DB::raw("count(id) as count"),'status')->groupBy('status')->pluck('count');

// dd($jobs_counts);
               

                $count = count($org_labels);

                for ($i=0; $i < $count; $i++) 
                { 
                    $color = substr(str_shuffle('ABCDEF0123456789'),0,6);

                    $colors[] = '#'.$color;
                    # code...
                }
                if (empty($colors)) {
                   $colors = '#FFF';
                }

                $org  = new SampleChart;

                $org->labels($org_labels);

                $org->dataset(' Donations Count','bar',$org_count)->backgroundColor($colors);

              //  $datas->dataset('Quue Status Count','bar',$jobs_counts)->backgroundColor($colors);
         }
         catch(\Illuminate\Database\QueryException $ex)
         {
                        $error = $ex->getMessage();
         }


    return view('home',compact('donations','newdonations','clients','receiveddonations','pendingddonations','datas','org'));
        return view('home');
    }
}
