<?php


namespace App\Repositories\Admin;


use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Interfaces\Admin\PostInterface;
use App\Models\Post;
use App\Traits\Admin\ResponseView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostRepository implements PostInterface
{
    use ResponseView;

    public function get()
    {
        // TODO: Implement get() method.
        $posts = Post::all();
        return $this->success('admin.posts.index',$posts);
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        $post = Post::find($id);
        if (! $post){
            return abort(404);
        }

        return $this->success('admin.posts.create',$post);
    }

    public function createView()
    {
        // TODO: Implement createView() method.
        return $this->success('admin.posts.create');
    }

    public function post(PostCreateRequest $request)
    {
        // TODO: Implement post() method.

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->summary = $request->summary;
        if (is_file($request->image)){


        }
        if ($request->comment_status)
        {
            $post->comment_status = 1;
        }
        $slug = $request->title.'-'.now()->timestamp;
        $post->slug = Str::slug($slug);
        $post->cat_id = $request->cat_id;
        $post->tag_id = $request->tag_id;

        $post->save();

        return redirect()->route('posts.index');

    }

    public function put(PostUpdateRequest $request,$id)
    {
        // TODO: Implement put() method.
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->summary = $request->summary;
        if (is_file($request->image)){


        }
        $post->comment_status = $request->comment_status;
        $slug = $request->title.now()->timestamp;
        $post->slug = Str::slug($slug);
        $post->cat_id = $request->cat_id;
        $post->tag_id = $request->tag_id;
        $post->save();

        return $this->success('admin.posts.index');

    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        $post = Post::find($id);
        if (! $post){
            return abort(404);
        }

        if (Auth::user()->role_id != 1) // is admin
        {
            return abort(404);
        }

        Post::destroy($id);
        return $this->success('admin.posts.index');
    }
}
