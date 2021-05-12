<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Setting;
use App\Traits\Admin\ResponseView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    use ResponseView;
    public function get()
    {
        $this->isAdmin();
        $settings = Setting::find(1); // Auto record from seeder
        return view('admin.settings')->with(['settings' => $settings]);
    }

    public function put(Request $request)
    {
        $this->isAdmin();
        $validator = Validator::make($request->all(),[
            'site_title' => 'required',
            'favicon' => 'nullable',
            'direct_comment_status' => 'nullable'
        ]);

        if ($validator->fails())
        {
            session()->flash('error', 'missing_fields');
            return redirect()->back();
        }

        $setting = Setting::find(1); // Auto record from seeder
        $setting->site_title = $request->input('site_title');
        if (is_file($request->favicon))
        {
            $path = Storage::disk('public_uploads')->put('images',$request->file('favicon'));
            if ($path)
            {
                File::delete(public_path('uploads/'.$setting->favicon));
            }
            $setting->favicon = $path;
        }
        if ($request->direct_comment_status)
        {
            $setting->direct_comment_status = 1;
        }else{
            $setting->direct_comment_status = 0;
        }
        $setting->save();

        session()->flash('status', 'ok');
        return redirect()->route('settings');
    }

    public function trendOn($id)
    {
       $post = Post::find($id);
       if (! $post)
       {
            return abort(404);
       }

       $post->trend_post_status = 1;
       $post->save();

       return redirect()->back();
    }

    public function trendOff($id)
    {
        $post = Post::find($id);
        if (! $post)
        {
            return abort(404);
        }

        $post->trend_post_status = 0;
        $post->save();

        return redirect()->back();
    }
}
