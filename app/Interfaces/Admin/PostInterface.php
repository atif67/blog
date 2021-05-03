<?php


namespace App\Interfaces\Admin;


use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;

interface PostInterface
{
    /*
     *
     *@method (GET)
     */
    public function get();

    /*
     *
     *@method (GET)
     */
    public function getById($id);

   /*
    *
    * @method (GET)
    */
    public function createView();

    /*
     *
     *@method (POST)
     */
    public function post(PostCreateRequest $request);

    /*
     *
     * @method (PUT)
     */
    public function put(PostUpdateRequest $request,$id);

    /*
     *
     * @method (DELETE)
     */
    public function destroy($id);


}
