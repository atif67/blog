<?php


namespace App\Http\Controllers;


use App\Http\Requests\PostCreateRequest;
use App\Interfaces\PostInterface;

class PostController extends Controller
{
    protected $postInterface;

    public function __construct(PostInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }

    public function get()
    {
        return $this->postInterface->get();
    }

    public function createPage()
    {
        return $this->postInterface->createPage();
    }

    public function post(PostCreateRequest $request)
    {
        return $this->postInterface->post($request);
    }

    public function editPage($slug)
    {
        return $this->postInterface->editPage($slug);
    }


    public function put(PostCreateRequest $request, $slug)
    {
        return $this->postInterface->put($request, $slug);
    }

    public function destroy()
    {
        return $this->postInterface->destroy();
    }


}
