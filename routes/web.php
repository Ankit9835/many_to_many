<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/create', function(){

	$post = Post::create([
		'name' => 'This is my first Post'
	]);

	$tag1 = Tag::find(1);

	$video = Video::create([
		'name' => 'video.mov'
	]);	

	$tag2 = Tag::find(2);

	$post->tags()->save($tag1);

	$video->tags()->save($tag2);

});

Route::get('/read', function(){

	$post = Post::find(1);

	foreach($post->tags as $tag){
		echo $tag;
	}

});

Route::get('/update', function(){

	$post = Post::find(1);

	foreach($post->tags as $tag){
		return $tag->whereName('Laravel')->update([
			'name' => 'Test'
		]);
	}

});

Route::get('/delete', function(){

	$post = Post::find(1);

	foreach($post->tags as $tag){
		$tag->whereId(1)->delete();
	}

});


Route::get('/view', function(){

	return view('test');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
