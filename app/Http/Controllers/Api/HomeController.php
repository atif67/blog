<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function get()
    {
        $query = request()->query('search');
        $categoryId = request()->query('category');
        if ($query)
        {
            $posts = Post::orWhere('title','like','%'.$query.'%')
                ->orWhere('content','like','%'.$query.'%')
                ->orderBy('id','desc')
                ->get();

            if ($posts->count() == 0)
            {
                $foundPost = 0;
                $posts = Post::inRandomOrder()->orderBy('id','desc')->get();
            }else{
                $foundPost = $posts->count();
            }
        }elseif ($categoryId){
            $posts = Post::where('cat_id', $categoryId)
                ->orderBy('id','desc')
                ->get();

            if ($posts->count() == 0)
            {
                $foundPost = 0;
                $posts = Post::inRandomOrder()->orderBy('id','desc')->get();
            }else{
                $foundPost = $posts->count();
            }
        }else{
            $posts = Post::inRandomOrder()->orderBy('id','desc')->get();
            $foundPost = $posts->count();
        }


        $users = User::get(['id','name']);
        return response()->json([
            'posts' => $posts, 'users' => $users, 'foundPost' => $foundPost
        ]);
    }
}
