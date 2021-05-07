<?php


namespace App\Repositories\Admin;


use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Interfaces\Admin\PostInterface;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Traits\Admin\ResponseView;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostRepository implements PostInterface
{
    use ResponseView;

    public function get()
    {
        // TODO: Implement get() method.
        $catId = request()->query('category-id');
        if ($catId)
        {
            $posts = Post::where('cat_id',$catId)->with('category')->orderBy('id','desc')->get();
        }else
        {
            $posts = Post::with('category')->orderBy('id','desc')->get();
        }

        $userId = request()->query('user');

        if ($userId)
        {
            $posts = Post::where('user_id', $userId)->with('category')->orderBy('id','desc')->get();
        }

        $post_tags = PostTag::with('posts')->with('tags')->get();

        return view('admin.posts.index')->with(['posts' => $posts, 'post_tags' => $post_tags]);
    }

    public function getById($slug)
    {

        // TODO: Implement getById() method.
        $post = Post::where('slug',$slug)->first();
        if (! $post){
            return abort(404);
        }
        $post_tags = PostTag::with('posts')->with('tags')->get();
        $categories = Category::all();
        $tags = Tag::all();


        return view('admin.posts.create')->with([
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
            'post_tags' => $post_tags
        ]);
    }

    public function createView()
    {
        // TODO: Implement createView() method.
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create')->with(['categories' => $categories, 'tags' => $tags]);
    }

    public function post(PostCreateRequest $request)
    {
        // TODO: Implement post() method.
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->summary = $request->input('summary');
        if (is_file($request->image)){
            $generateFileName = now()->unix().rand(); // generate uniq file name
            $extension = $request->file('image')->extension(); // get file extension
            $fullName = $generateFileName.'.'.$extension;

            $path = $request->file('image')->storeAs('images',$fullName,'public'); // storing file
            $post->image = $path;
        }
        if ($request->input('comment_status'))
        {
            $post->comment_status = 1;
        }
        $slug = $request->input('title').'-'.now()->timestamp;
        $post->slug = Str::slug($slug);
        $post->cat_id = $request->input('cat_id');
        $post->save();

        foreach ($request->input('tag_id') as $tag_id)
        {
            $post_tag = new PostTag();
            $post_tag->post_id = $post->id;
            $post_tag->tag_id = $tag_id;
            $post_tag->save();
        }

        return redirect()->route('posts.index');

    }

    public function put(PostUpdateRequest $request,$slug)
    {

        // TODO: Implement put() method.
        $post = Post::where('slug',$slug)->first();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->summary = $request->input('summary');

        if (is_file($request->image)){
            $generateFileName = now()->unix().rand(); // generate uniq file name
            $extension = $request->file('image')->extension(); // get file extension
            $fullName = $generateFileName.'.'.$extension;

            $path = $request->file('image')->storeAs('images',$fullName,'public'); // storing file
            $post->image = $path;
        }
        if ($request->comment_status)
        {
            $post->comment_status = 1;
        }else{
            $post->comment_status = 0;
        }

        $slug = $request->input('title').now()->timestamp;
        $post->slug = Str::slug($slug);
        $post->cat_id = $request->input('cat_id');
        $post->save();

        $post_tag = PostTag::where('post_id',$post->id)->get()->toArray();

        foreach ($request->input('tag_id') as $tag_id)
        {
            foreach ($post_tag as $item){
                $postTag = PostTag::find(data_get($item,'id'));
                $postTag->tag_id = $tag_id;
                $postTag->save();
            }
        }

        return redirect()->route('posts.index');

    }

    public function destroy($slug)
    {
        // TODO: Implement destroy() method.
        $post = Post::where('slug', $slug)->first();
        if (! $post){
            return abort(404);
        }

        if (Auth::user()->role_id != 1) // is admin
        {
            return abort(404);
        }

        Post::destroy($post->id);
        return redirect()->route('posts.index');
    }
}
