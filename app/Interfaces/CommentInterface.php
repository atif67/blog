<?php


namespace App\Interfaces;


use App\Http\Requests\Admin\CommentCreateRequest;

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

    /*
     *
     * @method (POST)
     */
    public function commentConfirmOrDelete($id,$case);
}
