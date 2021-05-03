<?php


namespace App\Repositories\Admin;


use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\Admin\UserInterface;
use App\Models\User;
use App\Traits\Admin\ResponseView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
    use ResponseView;

    public function loginView()
    {
        return $this->view('admin.login.login');
    }

    public function login(UserLoginRequest $request)
    {
        // TODO: Implement login() method.

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.home');
        }

        return back()->withErrors([
            'status' => 'false'
        ]);

    }

    public function logout(Request $request)
    {
        // TODO: Implement logout() method.

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function get()
    {
        // TODO: Implement get() method.
        $this->isAdmin();

        $query = request()->query('role');
        if ($query)
        {
            $users = User::where('role_id',$query)->with('role')->get();
        }else{
            $users = User::with('role')->get();
        }

        return view('admin.users.index')->with(['users' => $users]);

    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        $this->isAdmin();
        $user = User::find($id);
        if(! $user)
        {
            return abort(404);
        }

        $roles = Role::all();

        return view('admin.users.create')->with(['user' => $user,'roles' => $roles]);
    }

    public function createView()
    {
        // TODO: Implement createView() method.
        $this->isAdmin();

        $roles = Role::all();
        return view('admin.users.create')->with(['roles' => $roles]);
    }

    public function post(UserCreateRequest $request)
    {
        // TODO: Implement post() method.
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('users.index');
    }

    public function put(UserUpdateRequest $request, $id)
    {
        // TODO: Implement put() method.
        $this->isAdmin();

        $user = User::find($id);
        if(! $user)
        {
            return abort(404);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        $this->isAdmin();

        $user = User::find($id);
        if (!$user)
        {
            abort(404);
        }

        User::destroy($id);

        return redirect()->back();

    }
}
