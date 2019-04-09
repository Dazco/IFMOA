<?php

namespace App\Http\Controllers\Admin;

use App\Grade;
use App\Notifications\Member\MemberApproved;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class AdminMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $grades = Grade::all();
        $members = User::where('is_active','1')->get();
        return view('admin.members.index',compact('members','grades'));
    }
    public function inactive()
    {
        //
        $grades = Grade::all();
        $members = User::where('is_active','0')->where('is_approved','1')->get();
        return view('admin.members.inactive',compact('members','grades'));
    }
    public function unapproved()
    {
        //
        $members = User::where('is_approved','0')->get();
        return view('admin.members.unapproved',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $member = User::findOrFail($id);
        return view('admin.members.show',compact('member'));
    }
    public function manage($id)
    {
        //
        $grades = Grade::pluck('name','id')->all();
        $member = User::findOrFail($id);
        return view('admin.members.manage',compact('member','grades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $member = User::findOrFail($id);
        if($member->update($request->all())){
            Session::flash('alert-success',"The member '$member->name' has been updated");
        }else{
            Session::flash('alert-danger',"The member '$member->name' could not be updated");
        }
        return redirect()->back();
    }
    public function approve(Request $request, $id)
    {
        //
        $request->validate([
            'registration_number'=>'required|unique:users',
            'grade_id' => 'required'
        ]);
        $data = $request->all(0);
        $data['is_approved'] = '1';
        $data['is_active'] = '1';
        $member = User::findOrFail($id);
        $member->update($data);
        $member->notify(new MemberApproved($member));
        $admins = User::where('is_admin',1)->where('is_active', 1)->get()->all();
        Notification::send($admins, new \App\Notifications\Admin\MemberApproved($member));
        Session::flash('alert-success',"The member '$member->name' has been approved");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
