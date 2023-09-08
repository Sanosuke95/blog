<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function __invoke()
    {
        $post = '';
        $variable = null;
        $db = Post::all();
        $posts = Post::paginate(8);
        for ($i = 0; $i <= count($db); $i++) {
            if ($i == count($db)) {
                $post = $db[$i - 1];
            }
        }
        return view('static.home', compact('post', 'posts', 'variable'));
    }
}
