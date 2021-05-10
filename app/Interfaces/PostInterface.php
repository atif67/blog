<?php


namespace App\Interfaces;


use App\Http\Requests\PostCreateRequest;

interface PostInterface
{
    /*
     *
     * @method (GET)
     */
    public function get();

    /*
     *
     * @method (GET)
     */
    public function createPage();

    /*
     *
     * @method (POST)
     */
    public function post(PostCreateRequest $request);

    /*
     *
     * @method (GET)
     */
    public function editPage($slug);

    /*
     *
     * @method(PUT)
     */
    public function put(PostCreateRequest $request,$slug);

    /*
     *
     * @method (DELETE)
     */
    public function destroy($slug);
}
