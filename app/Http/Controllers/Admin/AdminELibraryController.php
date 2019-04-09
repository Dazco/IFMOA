<?php

namespace App\Http\Controllers\Admin;

use App\ELibrary;
use App\Notifications\ElibraryUploaded;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminELibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $eLibrary = ELibrary::all();
        return view('admin.eLibrary.index',compact('eLibrary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.eLibrary.create');
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
            $filename = $file->getClientOriginalName() . '_' . time();
            $path = $file->storePubliclyAs('public/uploads/eLibrary',$filename);

            $data['path'] = $path;
        }
        $eLibrary = Auth::user()->eLibrary()->create($data);

        Session::flash('alert-success',"The eLibrary resource '$eLibrary->title' has been uploaded successfully");
        $members = User::where('is_active',1)->get()->all();
        Notification::send($members,new ElibraryUploaded($eLibrary));

        return redirect('admin/eLibrary');
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
        $eLibrary = ELibrary::findOrFail($id);
        return view('admin.eLibrary.edit',compact('eLibrary'));
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

        $eLibrary = Auth::user()->eLibrary()->findOrFail($id);

        /*Photo*/
        if($request->hasFile('resource') && $request->file('resource')->isValid()){
            $file = $request->file('resource');
            $path = $file->storePublicly('public/uploads/eLibrary');
            if($eLibrary->path) {
                if (Storage::exists($eLibrary->path)) Storage::delete($eLibrary->path);
            }
            $data['path'] = $path;
        }
        if($eLibrary->update($data)){
            Session::flash('alert-success',"The E-Library resource '$eLibrary->title' has been updated");
        }else{
            Session::flash('alert-danger',"The E-Library resource '$eLibrary->title' could not be updated. Please contact support.");
        }
        return redirect('admin/eLibrary');
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
        $eLibrary = ELibrary::findOrFail($id);
        if($eLibrary->path) {
            if (Storage::exists($eLibrary->path)) Storage::delete($eLibrary->path);
        }
        if($eLibrary->delete()){
            Session::flash('alert-danger',"The E-Library resource '$eLibrary->title' has been deleted");
        }
        return redirect('/admin/eLibrary');
    }
    public function download($id){
        $eLibrary = ELibrary::findOrFail($id);
        if(Storage::exists($eLibrary->path)){
            return Storage::download($eLibrary->path);
        }
        Session::flash('alert-danger',"The E-Library resource '$eLibrary->title' could not be found");
        return redirect()->back();
    }
}
