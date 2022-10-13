<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Author\DashboardController as AuthorDashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    $posts=Post::paginate(5);
    return view('home.home',compact('posts'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth','admin']], function(){
//     Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
// });

Route::resource('/post', PostController::class)->middleware(['auth', 'verified']);


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified','admin'])->name('admin.dashboard');
//Route::put('/statusupdate/{$id}', [DashboardController::class, 'hidepost'])->middleware(['auth', 'verified','admin'])->name('admin.dashboard');
Route::get('changeStatus', [DashboardController::class, 'hidepost'])->middleware(['auth', 'verified','admin'])->name('admin.post.status');

Route::get('/author/dashboard', [AuthorDashboardController::class, 'index'])->middleware(['auth', 'verified','author'])->name('author.dashboard');
Route::post('/comment/add', [CommentController::class, 'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');
// Route::group(['prefix'=>'author','as'=>'author.','namespace'=>'Author','middleware'=>['auth','author']], function(){
//     Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    
// });


require __DIR__.'/auth.php';
