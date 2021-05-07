<?php


namespace App\Interfaces;


use App\Http\Requests\CommentCreateRequest;

interface CommentInterface
{
    /*
     *
     * @method (POST)
     */
    public function post(CommentCreateRequest $request,$postId);

    /*
     *
     * @method (GET)
     */
    public function get();
}
