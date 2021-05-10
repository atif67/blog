<?php


namespace App\Repositories\Admin;


use App\Http\Requests\Admin\UpdatePasswordRequest;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserLoginRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Interfaces\Admin\UserInterface;
use App\Models\Post;
use App\Models\User;
use App\Traits\Admin\ResponseView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserInterface
{
    use ResponseView;

    public function loginView()
    {
        if (Auth::user())
        {
            return redirect()->route('admin.home');
        }
        return $this->view('admin.login.login');
    }

    public function login(UserLoginRequest $request)
    {
        // TODO: Implement login() method.

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
            {
                $request->session()->regenerate();
                return redirect()->route('admin.home');
            }else{
                Auth::logout();
                return back()->withErrors([
                    'status' => 'false'
                ]);
            }
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

    public function profile()
    {
        $posts = Post::get('user_id');
        return view('admin.users.profile')->with(['posts' => $posts]);
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

        $posts = Post::get('user_id');

        return view('admin.users.index')->with(['users' => $users,'posts' => $posts]);

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

    public function updateProfile(UpdateProfileRequest $request, $id)
    {
        // TODO: Implement updateProfile() method.
        if (Auth::id() != $id)
        {
            return abort(404);
        }
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->about = $request->input('about');

        if (is_file($request->file('image'))){


            $path = Storage::disk('public_uploads')->put('images',$request->file('image'));
            $user->avatar = $path;

        }

        $user->save();
        session()->flash('status', 'ok');
        return redirect()->route('users.profile');

    }

    public function updatePassword(UpdatePasswordRequest $request, $id)
    {
        // TODO: Implement updatePassword() method.
        if (Auth::id() != $id)
        {
            return abort(404);
        }

        if (Hash::check($request->old_pass, auth()->user()->password))
        {
            $user = User::find(auth()->id());
            $user->password = Hash::make($request->input('new_pass'));
            $user->save();
            session()->flash('status', 'ok');
            return redirect()->route('users.profile');

        }else{
            session()->flash('error', 'invalid_pass');
            return redirect()->back();
        }

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
