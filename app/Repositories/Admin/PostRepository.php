<?php


namespace App\Repositories\Admin;


use App\Http\Requests\Admin\PostCreateRequest;
use App\Http\Requests\Admin\PostUpdateRequest;
use App\Interfaces\Admin\PostInterface;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Traits\Admin\ResponseView;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostRepository implements PostInterface
{
    use ResponseView;

    public function get()
    {
        // TODO: Implement get() method.

        $posts = Post::with('category')->orderBy('id','desc')->paginate(20);

        $catId = request()->query('category-id');
        if ($catId)
        {
            $posts = Post::where('cat_id',$catId)->with('category')->orderBy('id','desc')->paginate(20);
        }

        $userId = request()->query('user');
        if ($userId)
        {
            $posts = Post::where('user_id', $userId)->with('category')->orderBy('id','desc')->paginate(20);
        }

        $search = request()->query('search');
        if ($search){

            $posts = Post::orWhere('title','like','%'.$search.'%')
                ->orWhere('content','like','%'.$search.'%')
                ->orderBy('id','desc')
                ->paginate(20);
        }

        $post_tags = PostTag::with('posts')->with('tags')->get();

        $postsAllCount = Post::count();

        return view('admin.posts.index')->with(['posts' => $posts, 'post_tags' => $post_tags, 'postsAllCount' => $postsAllCount]);
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
        if (is_file($request->file('image'))){

            $path = Storage::disk('public_uploads')->put('images',$request->file('image'));
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

        if (is_file($request->file('image'))){

            $path = Storage::disk('public_uploads')->put('images',$request->file('image'));
            if ($path)
            {
                File::delete(public_path('uploads/'.$post->image));
            }
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

        PostTag::where('post_id',$post->id)->delete();

        foreach ($request->input('tag_id') as $tagId)
        {
            $post_tag = new PostTag();
            $post_tag->post_id = $post->id;
            $post_tag->tag_id = $tagId;
            $post_tag->save();
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
        File::delete(public_path('uploads/'.$post->image));
        Post::destroy($post->id);
        return redirect()->route('posts.index');
    }
}
