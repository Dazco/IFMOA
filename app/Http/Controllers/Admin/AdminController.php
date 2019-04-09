<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Tracker;

class AdminController extends Controller
{
    //
    public function dashboard(){
        $members = User::all();
        return view('admin.dashboard',compact('members'));
    }
}
