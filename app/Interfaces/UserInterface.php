<?php


namespace App\Interfaces;


use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;

interface UserInterface
{
    /*
     *
     * @method (GET)
     */
    public function loginView();

    /*
     *
     * @method (POST)
     */
    public function login(UserLoginRequest $request);

    /*
     *
     * @method (GET)
     */
    public function registerView();

    /*
     *
     * @method (POST)
     */
    public function register(UserRegisterRequest $request);

    /*
     *
     * @method (GET)
     */
    public function get();

    /*
     *
     * @method (GET)
     */
    public function updateProfileView();

    /*
     *
     * @method (PUT)
     */
    public function updateProfile(UserUpdateRequest $request);
}
