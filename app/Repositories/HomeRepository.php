<?php


namespace App\Repositories;


use App\Interfaces\HomeInterface;
use App\Models\Category;
use App\Models\Comment;
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
        $query = request()->query('search');
        $categoryId = request()->query('category');
        if ($query)
        {
            $posts = Post::orWhere('title','like','%'.$query.'%')
                ->orWhere('content','like','%'.$query.'%')
                ->orderBy('id','desc')
                ->paginate(20);

            if (data_get($posts->toArray(),'total') == 0)
            {
                $foundPost = 0;
                $posts = Post::inRandomOrder()->orderBy('id','desc')->paginate(20);
            }else{
                $foundPost = $posts->count();
            }
        }elseif ($categoryId){
            $posts = Post::where('cat_id', $categoryId)
                ->orderBy('id','desc')
                ->paginate(20);

            if (data_get($posts->toArray(),'total') == 0)
            {
                $foundPost = 0;
                $posts = Post::inRandomOrder()->orderBy('id','desc')->paginate(20);
            }else{
                $foundPost = $posts->count();
            }
        }else{
            $posts = Post::inRandomOrder()->orderBy('id','desc')->paginate(20);
            $foundPost = $posts->count();
        }


        $users = User::get(['id','name']);

        return view('index')->with(['posts' => $posts,'users' => $users, 'foundPost' => $foundPost]);
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
        $popularPosts = Post::where('trend_post_status',1)->inRandomOrder()->take(3)->get();
        $comments = Comment::where('post_id',$post->id)->get();

        return view('posts.show')->with([
            'post' => $post,
            'user' => $user,
            'roles' => $roles,
            'post_tags' => $post_tags,
            'categories' => $categories,
            'tags' => $tags,
            'popularPosts' => $popularPosts,
            'comments' => $comments
        ]);
    }
}
