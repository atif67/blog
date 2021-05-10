<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostCreateRequest;
use App\Http\Requests\Admin\PostUpdateRequest;
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

    public function getById($slug)
    {
        return $this->postInterfaces->getById($slug);
    }

    public function createView()
    {
        return $this->postInterfaces->createView();
    }

    public function post(PostCreateRequest $request)
    {
        return $this->postInterfaces->post($request);
    }

    public function put(PostUpdateRequest $request,$slug)
    {
        return $this->postInterfaces->put($request,$slug);
    }

    public function destroy($slug)
    {
        return $this->postInterfaces->destroy($slug);
    }

}
