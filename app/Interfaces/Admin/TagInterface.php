<?php


namespace App\Interfaces\Admin;


use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;

interface TagInterface
{
    /*
     *
     * @method (GET)
     */
    public function get();

    /*
     *
     * @method (POST)
     */
    public function post(TagCreateRequest $request);

    /*
     *
     * @method (PUT)
     * @param  $id
     */
    public function put(TagUpdateRequest $request,$id);

    /*
     *
     * @method (DELETE)
     * @param  $id
     */
    public function destroy($id);
}
