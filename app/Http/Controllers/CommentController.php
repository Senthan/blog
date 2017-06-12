<?php

namespace App\Http\Controllers;

use App\Comment;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    public function addComment($id)
    {
        $this->validate(request(), [
            'comment' => 'required'
        ]);

        $currentModel = request()->input('current_model');
        $relatedModel = app('App\\' . $currentModel)->find($id);
        $user = auth()->user();
        $comment = request()->input('comment');
        $comment = (new Comment())->create([
            'comment' => $comment,
            'user_id' => $user->id,
            'parent_id' => request()->input('parent_id')
        ]);
        $url = request()->server('HTTP_REFERER');
        $relatedModel->comments()->save($comment);

        if (request()->ajax()) {
            return response()->json(['return' => true]);
        }

        return redirect()->back();
    }

    public function removeComment(Comment $comment)
    {
        $comment->delete();
    }

    public function view($id)
    {
        $model = request()->input('model');

        $model = app('App\\' . $model)->find($id);

        $now = carbon()->now();
        $model->load('comments');
        return collect($model->getRelation('comments'))
            ->where('parent_id', request()->input('parent'))
            ->each(function ($obj) use ($model, $now) {
                $obj->child = $model->comments->where('parent_id', $obj->id)->count();
                $obj->ago = $obj->created_at->diffForHumans($now);
            });
    }

}
