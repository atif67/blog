<?php


namespace App\Repositories;


use App\Http\Requests\PostCreateRequest;
use App\Interfaces\PostInterface;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostRepository implements PostInterface
{
    public function get()
    {
        // TODO: Implement get() method.
    }

    public function createPage()
    {;
        // TODO: Implement createPage() method.
        $categories = Category::all();
        $tags = Tag::all();
        return view('users.posts.create')->with(['categories' => $categories, 'tags' => $tags]);
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

        return redirect()->route('profile');

    }

    public function editPage($slug)
    {
        // TODO: Implement editPage() method.
    }

    public function put(PostCreateRequest $request, $slug)
    {
        // TODO: Implement put() method.
    }

    public function destroy($slug)
    {
        // TODO: Implement destroy() method.
    }


}
