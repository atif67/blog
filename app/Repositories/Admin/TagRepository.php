<?php


namespace App\Repositories\Admin;


use App\Http\Requests\Admin\TagCreateRequest;
use App\Http\Requests\Admin\TagUpdateRequest;
use App\Interfaces\Admin\TagInterface;
use App\Models\Tag;
use App\Traits\Admin\ResponseView;

class TagRepository implements TagInterface
{
    use ResponseView;
    public function get()
    {
        // TODO: Implement get() method.
        $tags = Tag::all();

        return view('admin.tags.index')->with(['tags' => $tags]);
    }

    public function post(TagCreateRequest $request)
    {
        // TODO: Implement post() method.

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tags.index');
    }

    public function put(TagUpdateRequest $request,$id)
    {
        // TODO: Implement put() method.

        $tag = Tag::find($id);

        if (! $tag)
        {
            return abort(404);
        }
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        if (! Tag::find($id))
        {
            return abort(404);
        }

        Tag::destroy($id);
        return redirect()->route('tags.index');
    }
}
