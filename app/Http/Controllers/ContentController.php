<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Content;
use Token;
use App\Models\User;
use Auth;
 use Yajra\Datatables\Datatables;

class ContentController extends Controller
{
    //

    //

    public function news()
    {
    	return view('content.newsupload');
    }

    #get dropdowns
     public function content()
    {
       $faculties = Content::query();
        return Datatables::of($faculties)
            ->addColumn('action', function ($faculties) {
                return '<a href="news-drop/'.$faculties->id.'" class="badge badge-danger">Drop </a> ';
        })->make(true); 
  
    }

    public function drop($id)
    {
    	$data = Content::findorfail($id);
    	$data->delete();

    	return back()->with('warning','successfully dropped');
    	return view('content.viewnews',compact('data'));
    }


     public function view($id)
    {
    	$data = Content::all()->where('token',$id)->first();
    	return view('content.viewnews',compact('data'));
    }

    public function store(Request $request)
	{
		//return $request;
			$content  = new Content();

			$content->token = Token::RandomString(5);;
			
			$content->name = $request->input('title');

			$content->brief_desc = $request->input('brief_desc');
			
			$content->category = $request->input('category');
		
			 $media = $request->file('cover_photo');   
			  $at = $request->file('pictures');               
            

                          if($request->hasfile('cover_photo'))
                          {  
                                if (!empty($media)) {
                                    $destinationPath = public_path('asset/images/dashboard/');
                                    $filename = $media->getClientOriginalName();;
                                  //  \Image::make($media)->save(storage_path('uploads/image.jpg'));
                                   // $request->file('cover_photo')->store('asset/images/dashboard/','publicfile');
                             $media->move($destinationPath, $filename);
                                    $content->cover_photo= $filename;
                                  }
                                 
                             }

                              if($request->hasfile('pictures'))
          { 
						   foreach ($at as $files) 
						              {             
						                if (!empty($files)) 
						                {
						                     $destinationPath = public_path('asset/images/dashboard/');
						                                    $filename = $files->getClientOriginalName();;
						                                    $files->move($destinationPath, $filename);
						                    $files1[] = $filename;
						                  }
						                }
						              $upl->file = implode(';', $files1);
          }
			
			
			
			$content->description = $request->input('description');
			
			$content->status = 'Active';
			
			// $content->extra_one = $request('extra_one');
			
			// $content->uploaded_by = $request('uploaded_by');
			
					$content->save();


					return back()->with('status','Successfully saved');
	}


}
