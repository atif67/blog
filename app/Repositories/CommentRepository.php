<?php


namespace App\Repositories;


use App\Http\Requests\Admin\CommentCreateRequest;
use App\Interfaces\CommentInterface;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Setting;
use App\Traits\Admin\ResponseView;
use Illuminate\Support\Facades\Auth;

class CommentRepository implements CommentInterface
{
    use ResponseView;

    public function get()
    {
        // TODO: Implement get() method.
        $comments = Comment::orderBy('id','desc')->with(['post','user'])->get();
        return view('admin.comments.index')->with(['comments' => $comments]);
    }

    public function post(CommentCreateRequest $request,$postId)
    {
        // TODO: Implement post() method.
        $postCommentStatus = Post::where('id', $postId)->get('comment_status')->toArray();
        $postCommentStatus = data_get($postCommentStatus[0],'comment_status');

        if ($postCommentStatus == 1)
        {
            $comment = new Comment();
            $commentPublishPermission = Setting::find(1); // Yapılan yorumun direkt olarak yayınlanıp yayınlanmadığına göre aksiyon alınıyor.

            $comment->post_id = $postId;
            $comment->user_id = Auth::id();
            $comment->content = $request->input('content');

            if ($commentPublishPermission->direct_comment_status == 1)
            {
                $comment->confirmation_status = 1;
            }
            $comment->save();

            if ($commentPublishPermission->direct_comment_status == 1)
            {
                session()->flash('status','ok');
                return redirect()->back();
            }else{
                session()->flash('waitingForCheck', 'ok');
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function commentConfirmOrDelete($id,$case)
    {
        $this->isAdmin();
        $this->isEditor();

        $comment = Comment::find($id);
        if (!$comment)
        {
            return abort(404);
        }

        switch ($case){
            case 1:
                $comment->confirmation_status = 1;
                $comment->save();
                return redirect()->back();
            case 2:
                Comment::destroy($id);
                return redirect()->back();
            default:
                return abort(404);
        }
    }

}
