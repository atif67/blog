<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserUpdateRequest;
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

    public function destroy($id)
    {
        return $this->userInterfaces->destroy($id);
    }
}
