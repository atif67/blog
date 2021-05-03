<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Interfaces\Admin\PostInterface;

class PostController extends Controller
{
    protected $postInterfaces;

    public function __construct(PostInterface $postInterfaces)
    {
        $this->postInterfaces = $postInterfaces;
    }

    public function get()
    {
        return $this->postInterfaces->get();
    }

    public function getById($id)
    {
        return $this->postInterfaces->getById($id);
    }

    public function createView()
    {
        return $this->postInterfaces->createView();
    }

    public function post(PostCreateRequest $request)
    {
        return $this->postInterfaces->post($request);
    }

    public function put(PostUpdateRequest $request,$id)
    {
        return $this->postInterfaces->put($request,$id);
    }

    public function destroy($id)
    {
        return $this->postInterfaces->destroy($id);
    }

}
