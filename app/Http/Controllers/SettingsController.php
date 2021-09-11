<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\SiteDropdown;

use Yajra\Datatables\Datatables;

use Token;

 use Illuminate\Support\Facades\Schema;

class SettingsController extends Controller
{
    //

      public function __construct()
    {
        $this->middleware('auth');
    }

  

    #get dropdowns
    public function dropdownsindex()
    {
      
        return Datatables::of(SiteDropdown::query())->make(true);
    }



 public function dropdownsettings()
  {
      $table = 'site_dropdowns';

     $tables = \DB::select('SHOW TABLES');

    // $tables = \DB::table('INFORMATION_SCHEMA.TABLES')
    //            ->select('TABLE_NAME')
    //            ->get();

     // return $tables;
 
    $column = Schema::getColumnListing($table);


 $dbname = \DB::connection()->getDatabaseName();
  $dbname = 'Tables_in_'.$dbname;
    $data = SiteDropdown::all();

    return view('settings.dropdown',compact('data','column','tables','dbname'));

  }

   public function getcolumns($id)
  {
    $table = $id;

    $data = Schema::getColumnListing($table);

    return $data;

  //  return view('iams.settings',compact('data','column'));

  }

  public function storedropdowns(Request $request)
  {
      $token = Token::Unique('site_dropdowns','token',5);
      
      $t = date("Y",strtotime("now"));
      
      $token = strtoupper('EKE-'.$token.'-'.$t);

      $data = new SiteDropdown();

      $data->token = $token;

      $data->table_name = $request->input('table_name');

      $data->column_name = $request->input('column_name');

      $data->item = $request->input('dropdown_name');

      $data->save();

      return back()->with('status','success');

    }

  

   public function dropwriteoffdropdown($request)
  {
   
    $data = IamsWriteoffDropdown::findorfail($request);

    $data->delete();

    return back()->with('danger','successfully');


  }

}
