<?php


namespace App\Repositories;


use App\Http\Requests\CommentCreateRequest;
use App\Interfaces\CommentInterface;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Setting;

class CommentRepository implements CommentInterface
{
    public function post(CommentCreateRequest $request,$postId)
    {
        // TODO: Implement post() method.
        $postCommentStatus = Post::where('id', $postId)->get('comment_status')->toArray();
        $postCommentStatus = data_get($postCommentStatus[0],'comment_status');

        if ($postCommentStatus == 1)
        {
            $comment = new Comment();
            $commentPublishPermission = Setting::find(1);

            $comment->post_id = $postId;
            $comment->name = $request->input('name');
            $comment->email = $request->input('email');
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

    public function get()
    {
        // TODO: Implement get() method.
        $comments = Comment::orderBy('id','desc')->with('post')->get();
        return view('admin.comments.index')->with(['comments' => $comments]);
    }
}
