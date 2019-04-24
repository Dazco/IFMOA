<?php

namespace App\Http\Controllers\Admin;

use App\Download;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminDownloadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $downloads = Download::all();
        return view('admin.downloads.index',compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.downloads.create');
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
        $data = $request->all();
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'resource' => 'required|file|mimes:pdf,doc,docx,xls,xlm,xla,xlc,xlt,xlw,ppt,pps,pot',
        ]);
        if($request->hasFile('resource') && $request->file('resource')->isValid()){
            $file = $request->file('resource');
            $filename = $data['title'] . '_' . time().'.'.$file->extension();
            $path = $file->storePubliclyAs('public/uploads/downloads',$filename);

            $data['path'] = $path;
        }
        $download = Auth::user()->downloads()->create($data);

        Session::flash('alert-success',"The Document '$download->title' has been uploaded successfully");
        $members = User::where('is_active',1)->get()->all();

        return redirect('admin/downloads');
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
        $download = Download::findOrFail($id);
        return view('admin.downloads.edit',compact('download'));
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
        $data = $request->all();
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'resource' => 'file|mimes:pdf,doc,docx,xls,xlm,xla,xlc,xlt,xlw,ppt,pps,pot'
        ]);

        $download = Download::findOrFail($id);

        /*Photo*/
        if($request->hasFile('resource') && $request->file('resource')->isValid()){
            $file = $request->file('resource');
            $filename = $data['title'] . '_' . time().'.'.$file->extension();
            $path = $file->storePubliclyAs('public/uploads/downloads',$filename);
            if($download->path) {
                if (Storage::exists($download->path)) Storage::delete($download->path);
            }
            $data['path'] = $path;
        }
        if($download->update($data)){
            Session::flash('alert-success',"The Public document '$download->title' has been updated");
        }else{
            Session::flash('alert-danger',"The public document '$download->title' could not be updated. Please contact support.");
        }
        return redirect('admin/downloads');
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
        $download = Download::findOrFail($id);
        if($download->path) {
            if (Storage::exists($download->path)) Storage::delete($download->path);
        }
        if($download->delete()){
            Session::flash('alert-danger',"The Public Document '$download->title' has been deleted");
        }
        return redirect('/admin/downloads');
    }
    public function download($id){
        $download = Download::findOrFail($id);
        dd($download);
        if(Storage::exists($download->path)){
            return Storage::download($download->path);
        }
        Session::flash('alert-danger',"The Public Document '$download->title' could not be found");
        return redirect()->back();
    }
}
