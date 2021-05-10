<?php


namespace App\Interfaces\Admin;


use App\Http\Requests\Admin\UpdatePasswordRequest;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserLoginRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use Illuminate\Http\Request;

interface UserInterface
{

    /*
     *
     *@method (GET)
     */
    public function loginView();

    /*
     *
     *@method (POST)
     */
    public function login(UserLoginRequest $request);

    /*
     *
     *@method (GET)
     */
    public function logout(Request $request);

    /*
     *
     *@method (GET)
     */
    public function profile();

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
    public function post(UserCreateRequest $request);

    /*
     *
     * @method (PUT)
     */
    public function put(UserUpdateRequest $request,$id);

    /*
     *
     * @method (PUT)
     */
    public function updateProfile(UpdateProfileRequest $request,$id);

    /*
     *
     * @method (PUT)
     */
    public function updatePassword(UpdatePasswordRequest $request,$id);

    /*
     *
     * @method (DELETE)
     */
    public function destroy($id);
}
