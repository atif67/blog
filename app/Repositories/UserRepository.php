<?php


namespace App\Repositories;


use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\UserInterface;
use App\Models\Post;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserInterface
{
    public function loginView()
    {
        if (Auth::user())
        {
            return redirect()->back();
        }

        return view('login.login');
    }

    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('/');
        }

        session()->flash('status', 'false');

        return redirect()->back();
    }

    public function registerView()
    {
        if (Auth::user())
        {
            return redirect()->back();
        }

        return view('login.register');
    }

    public function register(UserRegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('login');
    }


    public function get()
    {
        // TODO: Implement get() method.
        $posts = Post::where('user_id', Auth::id())->orderBy('id','desc')->paginate(20);
        $socialLinks = SocialLink::where('user_id',Auth::id())->first();
        return view('users.profile.index')->with(['posts' => $posts,'socialLinks' => $socialLinks]);
    }

    public function updateProfileView()
    {
        $socialLinks = SocialLink::where('user_id',Auth::id())->first();
        return view('users.profile.edit')->with(['socialLinks' => $socialLinks]);
    }

    public function updateProfile(UserUpdateRequest $request)
    {
        // TODO: Implement updateProfile() method.
        $user = User::find(Auth::id());
        $user->name = $request->input('name');
        $user->about = $request->input('about');
        if (is_file($request->file('avatar')))
        {
            $path = Storage::disk('public_uploads')->put('images',$request->file('avatar'));
            $user->avatar = $path;
        }
        if ($request->input('old_pass'))
        {
            if (Hash::check($request->input('old_pass'),Auth::user()->password))
            {
                $user->password = Hash::make($request->input('new_pass'));
            }else{
                session()->flash('error','invalid_pass');
                return redirect()->back();
            }
        }
        $user->save();

        if (SocialLink::where('user_id',Auth::id())->first())
        {
            $socialLink = SocialLink::where('user_id',Auth::id())->first();
            $socialLink->twitter = $request->input('twitter');
            $socialLink->github = $request->input('github');
            $socialLink->facebook = $request->input('facebook');
            $socialLink->linkedin = $request->input('linkedin');
            $socialLink->instagram = $request->input('instagram');
            $socialLink->save();
        }else{
            $socialLink = new SocialLink();
            $socialLink->user_id = Auth::id();
            $socialLink->twitter = $request->input('twitter');
            $socialLink->github = $request->input('github');
            $socialLink->facebook = $request->input('facebook');
            $socialLink->linkedin = $request->input('linkedin');
            $socialLink->instagram = $request->input('instagram');
            $socialLink->save();
        }
        session()->flash('status', 'ok');
        return redirect()->back();
    }
}
