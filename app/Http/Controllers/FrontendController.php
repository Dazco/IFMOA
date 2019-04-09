<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use App\Mail\Contact;
use App\Media;
use App\News;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    //
    /*Homepage Section*/
    public function index(){
        $news = News::latest()->take(3)->get();
        return view('frontend.index',compact('news'));
    }
    /*About Section*/
    public function about(){
        return view('frontend.about');
    }
    /*Registration Section*/
    public function register_why(){
        return view('frontend.register-why');
    }
    public function register_how(){
        return view('frontend.register-how');
    }
    public function register_benefits(){
        return view('frontend.register-benefits');
    }
    public function register_grade(){
        return view('frontend.register-grade');
    }
    public function register(){
        return view('frontend.register');
    }
    public function gallery(){
        $categories = Category::where('type','media')->has('media')->get();
        $gallery = Media::with('photo')->get();
        return view('frontend.gallery',compact('gallery','categories'));
    }
    public function blog(){
        $posts = Post::latest()->paginate(5);
        $categories = Category::where('type','post')->get();
        return view('frontend.blog',compact('posts','categories'));
    }
    public function category($category){
        $posts = Category::where('name',$category)->where('type','post')->firstOrFail()->posts()->latest()->paginate(5);
        $categories = Category::where('type','post')->get();
        return view('frontend.blog',compact('posts','categories'));
    }
    public function blog_post($slug){
        $posts = Post::latest()->take(5)->get();
        $post = Post::where('slug','like',"%$slug%")->firstOrFail();
        $categories = Category::where('type','post')->get();
        return view('frontend.blog-show',compact('post','categories','posts'));
    }
    public function news(){
        $news = News::latest()->paginate(5);
        $categories = Category::where('type','news')->get();
        return view('frontend.news',compact('news','categories'));
    }
    public function news_category($category){
        $news = Category::where('name',$category)->where('type','news')->firstOrFail()->news()->latest()->paginate(5);
        $categories = Category::where('type','news')->get();
        return view('frontend.news',compact('news','categories'));
    }
    public function news_post($slug){
        $news = News::latest()->take(5)->get();
        $news_single = News::where('slug','like',"%$slug%")->firstOrFail();
        $categories = Category::where('type','news')->get();
        return view('frontend.news-show',compact('news_single','categories','news'));
    }
    public function events(){
        $events = Event::latest()->paginate(5);
        $categories = Category::where('type','event')->get();
        return view('frontend.events',compact('events','categories'));
    }
    public function event($slug){
        $events = Event::latest()->take(5)->get();
        $event = Event::where('slug','like',"%$slug%")->firstOrFail();
        $categories = Category::where('type','event')->get();
        return view('frontend.event',compact('events','categories','event'));
    }
    public function events_category($category){
        $events = Category::where('name',$category)->where('type','event')->firstOrFail()->events()->latest()->paginate(5);
        $categories = Category::where('type','event')->get();
        return view('frontend.events',compact('events','categories'));
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function sendContact(Request $request){
        try{
            Mail::to('admin@ifmoa.org.ng')->send(new Contact($request));
        }catch (\Exception $error){
            return json_encode(['status'=>'failed','message'=>'Your Message could not be sent. You could contact admin@ifmoa.org.ng directly from your email address.']);
        }
        return json_encode(['status'=>'success']);
    }

    public function addMailingList($email){
        require 'vendor/autoload.php';
        $mgClient = new Mailgun('YOUR_API_KEY');
        $listAddress = 'LIST@YOUR_DOMAIN_NAME';

        $result = $mgClient->post("lists/$listAddress/members", array(
            'address'     => 'bar@example.com',
            'name'        => 'Bob Bar',
            'description' => 'Developer',
            'subscribed'  => true,
            'vars'        => '{"age": 26}'
        ));
    }

}
