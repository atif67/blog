<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserLoginRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Interfaces\Admin\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userInterfaces;

    public function __construct(UserInterface $userInterfaces)
    {
        $this->userInterfaces = $userInterfaces;
    }

    public function loginView()
    {
        return $this->userInterfaces->loginView();
    }

    public function login(UserLoginRequest $request)
    {
        return $this->userInterfaces->login($request);
    }

    public function logout(Request $request)
    {
        return $this->userInterfaces->logout($request);
    }

    public function profile()
    {
        return $this->userInterfaces->profile();
    }

    public function get()
    {
        return $this->userInterfaces->get();
    }

    public function getById($id)
    {
        return $this->userInterfaces->getById($id);
    }

    public function createView()
    {
        return $this->userInterfaces->createView();
    }

    public function post(UserCreateRequest $request)
    {
        return $this->userInterfaces->post($request);
    }

    public function put(UserUpdateRequest $request,$id)
    {
        return $this->userInterfaces->put($request,$id);
    }

    public function updateProfile(UpdateProfileRequest $request,$id)
    {
        return $this->userInterfaces->updateProfile($request,$id);
    }

    public function updatePassword(UpdatePasswordRequest $request,$id)
    {
        return $this->userInterfaces->updatePassword($request,$id);
    }

    public function destroy($id)
    {
        return $this->userInterfaces->destroy($id);
    }
}
