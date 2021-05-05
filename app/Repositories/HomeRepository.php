<?php


namespace App\Repositories;


use App\Interfaces\HomeInterface;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;

class HomeRepository implements HomeInterface
{
    public function get()
    {
        // TODO: Implement get() method.
        $posts = Post::orderBy('id','desc')->get(['slug','title','summary','user_id']);
        $users = User::get(['id','name']);
        return view('index')->with(['posts' => $posts,'users' => $users]);
    }

    public function postDetail($slug)
    {
        // TODO: Implement postDetail() method.
        $post = Post::where('slug', $slug)->with('category')->first();
        $user = User::where('id', $post->user_id)->first();
        $roles = Role::all();
        $post_tags = PostTag::with('posts')->with('tags')->get();
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.show')->with([
            'post' => $post,
            'user' => $user,
            'roles' => $roles,
            'post_tags' => $post_tags,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }
}
