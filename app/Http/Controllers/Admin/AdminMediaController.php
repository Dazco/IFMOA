<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Media;
use App\Notifications\MediaUploaded;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $media = Media::all();
        return view('admin.media.index',compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::where('type','media')->pluck('name','id');
        return view('admin.media.create',compact('categories'));
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
            'photo' => 'required|image',
            'description' => 'required',
            'category_id' => 'required_without:new_category',
            'new_category' => 'required_without:category_id',
        ],[
            'category_id.required_without' => "You need to select a category if you aren't making a new one",
            'new_category.required_without' => "You need to create a new category if you aren't selecting one",

        ]);
        if ($request->has('new_category')){
            $category = Category::firstOrCreate([
                'name' => $data['new_category'],
                'type' => 'media'
            ]);
            $data['category_id'] = $category->id;
        }
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');

            $media = Media::create($data);
            $path = $file->storePublicly('public/uploads/images/media');
            $media->photo()->create(['path'=>$path]);
        }
        Session::flash('alert-success',"The Media '$media->title' has been created");
        $members = User::where('is_active',1)->get()->all();
        Notification::send($members,new MediaUploaded($eLibrary));
        return redirect('admin/media');
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
    public function multiDestroy(Request $request){
        foreach ($request->all()['delete-me'] as $mediaId){
            $media = Media::findOrfail($mediaId);
            if($media->photo) {
                if (Storage::exists($media->photo->path)) Storage::delete($media->photo->path);
            }
            $media->photo? $media->photo->delete():'' ;
            $media->delete();
        }
        Session::flash('alert-danger',"Image(s) has(ve) been deleted");
        return redirect('admin/media');
    }
}
