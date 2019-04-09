<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Notifications\EventCreated;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::all();
        return view('admin.events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::where('type','event')->pluck('name','id');
        return view('admin.events.create',compact('categories'));
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
            'datetime' => 'required|date',
            'location' => 'required',
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
                'type' => 'event'
            ]);
            $data['category_id'] = $category->id;
        }
        $event = Auth::user()->events()->create($data);

        /*Photo*/
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');
            $path = $file->storePublicly('public/uploads/images/events');

            $event->photo()->create(['path'=>$path]);
        }
        Session::flash('alert-success',"The Event '$event->title' has been created");

        $members = User::where('is_active',1)->get()->all();
        Notification::send($members,new EventCreated($post));

        return redirect('admin/events');
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
        $event = Event::findOrFail($id);
        $categories = Category::where('type','event')->pluck('name','id');
        return view('admin.events.edit',compact('event','categories'));
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
            'datetime' => 'required|date',
            'location' => 'required',
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
                'type' => 'event'
            ]);
            $data['category_id'] = $category->id;
        }

        $event = Auth::user()->events()->findOrFail($id);

        /*Photo*/
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');
            $path = $file->storePublicly('public/uploads/images/events');
            if($event->photo) {
                if (Storage::exists($event->photo->path)) Storage::delete($event->photo->path);
            }
            $event->photo()->update(['path'=>$path]);
        }
        if($event->update($data)){
            Session::flash('alert-success',"The Event '$event->title' has been updated");
        }else{
            Session::flash('alert-danger',"The Event '$event->title' could not be updated. Please contact support.");
        }
        return redirect('admin/events');
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
        $event = Event::findOrFail($id);
        if($event->photo) {
            if (Storage::exists($event->photo->path)) Storage::delete($event->photo->path);
        }
        if($event->delete()){
            Session::flash('alert-danger',"The Event '$event->title' has been deleted");
        }
        return redirect('/admin/events');
    }
}
