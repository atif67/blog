<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagCreateRequest;
use App\Http\Requests\Admin\TagUpdateRequest;
use App\Interfaces\Admin\TagInterface;

class TagController extends Controller
{
    protected $tagInterface;

    public function __construct(TagInterface $tagInterface)
    {
        $this->tagInterface = $tagInterface;
    }

    public function get()
    {
        return $this->tagInterface->get();
    }

    public function post(TagCreateRequest $request)
    {
        return $this->tagInterface->post($request);
    }

    public function put(TagUpdateRequest $request, $id)
    {
        return $this->tagInterface->put($request,$id);
    }

    public function destroy($id)
    {
        return $this->tagInterface->destroy($id);
    }

}
