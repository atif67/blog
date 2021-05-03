<?php


namespace App\Interfaces\Admin;


use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;

interface CategoryInterface
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
    public function post(CategoryCreateRequest $request);

    /*
     *
     * @method (PUT)
     * @param  $id
     */
    public function put(CategoryUpdateRequest $request,$id);

    /*
     *
     * @method (DELETE)
     * @param  $id
     */
    public function destroy($id);
}
