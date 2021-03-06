<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
session_start();

class SliderController extends Controller
{
    public function index()
    {
    	$this->adminAuthCheck();
    	return view('admin.add_slider');
    }

    public function save_slider(Request $request)
    {
    	$data = [];
    	$data['publication_status'] = $request->publication_status;
        $image = $request->file('slider_image');
    	if($image) {
    		$image_name = str_random(20);
    		$ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'sliderimg/';
        $image_url = $upload_path.$image_full_name;
        $success = $image->move($upload_path,$image_full_name);
       if($success) {
       	  $data['slider_image'] = $image_url;

       	        DB::table('tbl_slider')->insert($data);
       	        Session::put('message','Slider Added Successfully !!');
       	        return Redirect::to('/add-slider');
       }
    	}
       $data['slider_image'] = '';
                  DB::table('tbl_slider')->insert($data);
                  Session::put('message','Slider Added Successfully Without Image !!');
                 return Redirect::to('/add-slider');
    }

    public function all_slider()
    {
    	$this->adminAuthCheck();
       $all_slider=DB::table('tbl_slider')->get();
       $manage_slider=view('admin.all_slider')
            ->with('all_slider',$all_slider);

            return view('admin_layout')
                     ->with('admin.all_slider',$manage_slider);
    }

    public function inactive_slider($slider_id)
    {
    	DB::table('tbl_slider')
               ->where('slider_id', $slider_id)
               ->update(['publication_status' => 0]);
                Session::put('message','Slider Unpublished Successfully !!');
          return Redirect::to('/all-slider');
    }

    public function active_slider($slider_id)
    {
    	DB::table('tbl_slider')
               ->where('slider_id', $slider_id)
               ->update(['publication_status' => 1]);
                Session::put('message','Slider Published Successfully !!');
          return Redirect::to('/all-slider');
    }

    public function delete_slider($slider_id)
    {
    	DB::table('tbl_slider')
    	        ->where('slider_id',$slider_id)
    	        ->delete();
    	Session::put('message','Slider Deleted Successfully !!'); 
    	return Redirect::to('/all-slider');       
    }

    public function adminAuthCheck()
    {
      $admin_id = Session::get('admin_id');
      if ($admin_id) {
        return;
      } else {
        return Redirect::to('/admin')->send();
      }
    }


}
