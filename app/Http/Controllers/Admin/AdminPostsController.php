<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Notifications\PostCreated;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::where('type','post')->pluck('name','id');
        return view('admin.posts.create',compact('categories'));
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
                'type' => 'post'
            ]);
            $data['category_id'] = $category->id;
        }
        $post = Auth::user()->posts()->create($data);

        /*Photo*/
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');
            $path = $file->storePublicly('public/uploads/images/posts');

            $post->photo()->create(['path'=>$path]);
        }
            Session::flash('alert-success',"The Post '$post->title' has been created");

        $members = User::where('is_active',1)->get()->all();
        Notification::send($members,new PostCreated($post));
        return redirect('admin/posts');
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
        $post = Post::findOrFail($id);
        $categories = Category::where('type','post')->pluck('name','id');
        return view('admin.posts.edit',compact('post','categories'));
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
                'type' => 'post'
            ]);
            $data['category_id'] = $category->id;
        }

        $post = Auth::user()->posts()->findOrFail($id);

        /*Photo*/
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');
            $path = $file->storePublicly('public/uploads/images/posts');
            if($post->photo) {
                if (Storage::exists($post->photo->path)) Storage::delete($post->photo->path);
            }
            $post->photo()->update(['path'=>$path]);
        }
        if($post->update($data)){
            Session::flash('alert-success',"The Post '$post->title' has been updated");
        }else{
            Session::flash('alert-danger',"The Post '$post->title' could not be updated. Please contact support.");
        }
        return redirect('admin/posts');
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
        $post = Post::findOrFail($id);
        if($post->photo) {
            if (Storage::exists($post->photo->path)) Storage::delete($post->photo->path);
        }
        if($post->delete()){
            Session::flash('alert-danger',"The Post '$post->title' has been deleted");
        }
        return redirect('/admin/posts');
    }
}
