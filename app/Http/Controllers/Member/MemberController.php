<?php

namespace App\Http\Controllers\Member;

use App\ELibrary;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    //
    public function dashboard(){
        $member = Auth::user();
        return view('member.dashboard',compact('member'));
    }
    public function details(){
        $member = Auth::user();
        return view('member.details',compact('member'));
    }
    public function password(){
        $member = Auth::user();
        return view('member.password',compact('member'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        $data = $request->all();
        $member = User::findOrFail($id);
        if (Hash::check($data['current_password'],$member->password)){
            if(Hash::check($data['password'],$member->password)){
                Session::flash('alert-danger',"Your New Password can't be the same as your old one");
                return redirect()->back();
            }
            $data['password'] = Hash::make($data['password']);
            $member->update($data);
            Session::flash('alert-success',"Your Password has been updated successfully");
        }else{
            Session::flash('alert-danger',"Your current password is incorrect");
            return redirect()->back();
        }
        return redirect('member/dashboard');
    }
    public function eLibrary()
    {
        //
        $eLibrary = ELibrary::all();
        return view('member.eLibrary',compact('eLibrary'));
    }
    public function eLibraryDownload($id){
        $eLibrary = ELibrary::findOrFail($id);
        if(Storage::exists($eLibrary->path)){
            return Storage::download($eLibrary->path);
        }
        Session::flash('alert-danger',"The E-Library resource '$eLibrary->title' could not be found");
        return redirect()->back();
    }
}
