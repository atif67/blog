<?php


namespace App\Interfaces;


use App\Http\Requests\UserUpdateRequest;

interface UserInterface
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
    public function profile();


    /*
     *
     * @method (PUT)
     */
    public function updateProfile(UserUpdateRequest $request);
}
