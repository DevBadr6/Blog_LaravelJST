<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    return view('posts.index', [
      'posts' => post::take(3)->get(),
    ]);
  }
}
