<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {

      $posts=Post::paginate(5);
      return view('admin.dashboard',compact('posts'));
   }

   public function hidepost(Request $request)
   {
      $posts = Post::find($request->id);
      $posts->status = $request->status;
      $posts->save();

      return response()->json(['success'=>'Status change successfully.']);
   }
}
