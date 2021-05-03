<?php


namespace App\Repositories\Admin;


use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Interfaces\Admin\CategoryInterface;
use App\Models\Category;
use App\Traits\Admin\ResponseView;

class CategoryRepository implements CategoryInterface
{
    use ResponseView;
    public function get()
    {
        // TODO: Implement get() method.
        $categories = Category::all();

        return view('admin.categories.index')->with(['categories' => $categories]);
    }

    public function post(CategoryCreateRequest $request)
    {
        // TODO: Implement post() method.

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index');
    }

    public function put(CategoryUpdateRequest $request,$id)
    {
        // TODO: Implement put() method.

        $category = Category::find($id);

        if (! $category)
        {
            return abort(404);
        }
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        if (! Category::find($id))
        {
            return abort(404);
        }

        Category::destroy($id);
        return redirect()->route('categories.index');
    }
}
