<?php


namespace App\Http\Controllers;


use App\Http\Requests\CommentCreateRequest;
use App\Interfaces\CommentInterface;

class CommentController extends Controller
{
    protected $commentInterface;

    public function __construct(CommentInterface $commentInterface)
    {
        $this->commentInterface = $commentInterface;
    }

    public function post(CommentCreateRequest $request,$postId)
    {
        return $this->commentInterface->post($request,$postId);
    }

    public function get()
    {
        return $this->commentInterface->get();
    }
}
