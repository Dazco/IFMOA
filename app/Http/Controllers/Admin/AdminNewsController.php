<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\NewsCreated;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = News::all();
        return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::where('type','news')->pluck('name','id');
        return view('admin.news.create',compact('categories'));
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
            'content' => 'required'
        ],[
            'category_id.required_without' => "You need to select a category if you aren't making a new one",
            'new_category.required_without' => "You need to create a new category if you aren't selecting one",

        ]);
        if ($request->has('new_category')){
            $category = Category::firstOrCreate([
                'name' => $data['new_category'],
                'type' => 'news'
            ]);
            $data['category_id'] = $category->id;
        }
        $news = Auth::user()->news()->create($data);

        /*Photo*/
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');
            $path = $file->storePublicly('public/uploads/images/news');

            $news->photo()->create(['path'=>$path]);
        }
        Session::flash('alert-success',"The News '$news->title' has been created");
        $members = User::where('is_active',1)->get()->all();
        Notification::send($members,new NewsCreated($news));

        return redirect('admin/news');
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
        $news = News::findOrFail($id);
        $categories = Category::where('type','news')->pluck('name','id');
        return view('admin.news.edit',compact('news','categories'));
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
            'category_id' => 'required_without:new_category',
            'new_category' => 'required_without:category_id',
            'content' => 'required'
        ],[
            'category_id.required_without' => "You need to select a category if you aren't making a new one",
            'new_category.required_without' => "You need to create a new category if you aren't selecting one",

        ]);
        if ($request->has('new_category')){
            $category = Category::updateOrCreate([
                'name' => $data['new_category'],
                'type' => 'news'
            ]);
            $data['category_id'] = $category->id;
        }

        $news = Auth::user()->news()->findOrFail($id);

        /*Photo*/
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');
            $path = $file->storePublicly('public/uploads/images/news');
            if($news->photo) {
                if (Storage::exists($news->photo->path)) Storage::delete($news->photo->path);
            }
            $news->photo()->update(['path'=>$path]);
        }
        if($news->update($data)){
            Session::flash('alert-success',"The News '$news->title' has been updated");
        }else{
            Session::flash('alert-danger',"The news '$news->title' could not be updated. Please contact support.");
        }
        return redirect('admin/news');
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
        $news = News::findOrFail($id);
        if($news->photo) {
            if (Storage::exists($news->photo->path)) Storage::delete($news->photo->path);
        }
        if($news->delete()){
            Session::flash('alert-danger',"The News '$news->title' has been deleted");
        }
        return redirect('/admin/news');
    }
}
