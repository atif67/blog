<?php


namespace App\Interfaces\Admin;


use App\Http\Requests\Admin\TagCreateRequest;
use App\Http\Requests\Admin\TagUpdateRequest;

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
