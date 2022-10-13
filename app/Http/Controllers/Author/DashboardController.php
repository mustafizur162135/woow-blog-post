<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {

      $posts=Post::paginate(5);

      return view('author.dashboard',compact('posts'));
   }

}
