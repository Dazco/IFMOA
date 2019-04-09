<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Frontend Routes*/
Route::get('/', 'FrontendController@index')->name('home');
Route::get('/about','FrontendController@about')->name('about');
Route::get('/register-why','FrontendController@register_why')->name('register-why');
Route::get('/register-how','FrontendController@register_how')->name('register-how');
Route::get('/register-benefits','FrontendController@register_benefits')->name('register-benefits');
Route::get('/register-grade','FrontendController@register_grade')->name('register-grade');
Route::get('/gallery','FrontendController@gallery')->name('gallery');
/*Blog routes*/
Route::get('/blog','FrontendController@blog')->name('blog');
Route::get('/blog/post/{slug}','FrontendController@blog_post')->name('blog.show');
Route::get('/blog/categories/{category}','FrontendController@category')->name('blog.category');
/*News routes*/
Route::get('/news','FrontendController@news')->name('news');
Route::get('/news/{slug}','FrontendController@news_post')->name('news.show');
Route::get('/news/categories/{category}','FrontendController@news_category')->name('news.category');
/*Events Routes*/
Route::get('/events','FrontendController@events')->name('events');
Route::get('/events/{slug}','FrontendController@event')->name('event.show');
Route::get('/events/categories/{category}','FrontendController@events_category')->name('events.category');

Route::get('/contact','FrontendController@contact')->name('contact');
Route::post('/contact','FrontendController@sendContact');
/*End Frontend routes*/

/*Member Routes*/
Route::auth();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::middleware('member')->namespace('Member')->prefix('member')->name('member.')->group(function () {
    Route::get('dashboard', 'MemberController@dashboard')->name('dashboard');
    Route::get('details', 'MemberController@details')->name('details');
    Route::get('password', 'MemberController@password')->name('password');
    Route::patch('update/{id}','MemberController@update');
    Route::get('eLibrary','MemberController@eLibrary')->name('eLibrary');
    Route::get('eLibrary/download/{id}','MemberController@eLibraryDownload');

    Route::get('payments','PaymentController@index')->name('payments');
    Route::get('payments/{id}','PaymentController@show')->name('payments.show');

    Route::get('conversations', 'ChatsController@fetchConversations');
    Route::get('conversation/{id}/messages', 'ChatsController@fetchMessages');
    Route::post('conversation/{id}/messages', 'ChatsController@sendMessage');
    Route::get('users/{name}', 'ChatsController@getMembers');
    Route::get('user/{id}/conversation','ChatsController@startConversation');
});
Route::middleware('member')->post('/pay', 'Member\PaymentController@redirectToGateway')->name('pay');
Route::middleware('member')->get('/payment/callback', 'Member\PaymentController@handleGatewayCallback');
/*End Member Routes*/

/*Admin Routes*/
Route::middleware(['member','admin'])->namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::resource('posts', 'AdminPostsController');
    Route::resource('news', 'AdminNewsController');
    Route::resource('events', 'AdminEventsController');
    Route::resource('posts/categories','AdminCategoriesController');
    Route::resource('media','AdminMediaController');
    Route::post('media/multiDestroy','AdminMediaController@multiDestroy');
    Route::resource('eLibrary','AdminELibraryController');
    Route::get('eLibrary/download/{id}','AdminELibraryController@download');
    Route::resource('payments','AdminPaymentsController');
    Route::resource('members','AdminMembersController');
    Route::get('inactive/members','AdminMembersController@inactive')->name('members.inactive');
    Route::get('unapproved/members','AdminMembersController@unapproved')->name('members.unapproved');
    Route::get('manage/members/{id}','AdminMembersController@manage')->name('members.manage');
    Route::patch('manage/members/{id}/approve','AdminMembersController@approve')->name('members.manage.approve');
});
/*End Admin Routes*/

