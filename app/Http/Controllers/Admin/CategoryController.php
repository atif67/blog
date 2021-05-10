<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Interfaces\Admin\CategoryInterface;

class CategoryController extends Controller
{
    protected $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    public function get()
    {
        return $this->categoryInterface->get();
    }

    public function post(CategoryCreateRequest $request)
    {
        return $this->categoryInterface->post($request);
    }

    public function put(CategoryUpdateRequest $request, $id)
    {
        return $this->categoryInterface->put($request,$id);
    }

    public function destroy($id)
    {
        return $this->categoryInterface->destroy($id);
    }
}
