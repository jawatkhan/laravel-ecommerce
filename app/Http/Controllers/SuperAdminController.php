<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
session_start();

class SuperAdminController extends Controller
{

    public function index()
    {
    	$this->adminAuthCheck();
    	return view('admin.dashboard');
    }

    public function logout()
    {
    	
    	Session::flush();
    	return Redirect::to('/admin');
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
