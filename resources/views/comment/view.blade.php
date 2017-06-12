<?php
$currentModel->load('comments');
$comments = $currentModel->getRelation('comments')->where('parent_id', null)
?>
<div id="comments" class="ui segment">
    <div class="ui comments threaded ">
        <h3 class="ui dividing header">Comments</h3>
        @if(!$comments->count())
            No comments added. Be the first to add a comment.
        @endif
        @foreach($comments as $comment)
            <div class="comment" data-id="{{ $comment->id }}">
                <a class="avatar">
                    <img src="{{ asset('profile-image/' . $comment->user->id) }}">
                </a>
                <div class="content">
                    <a class="author">{{ $comment->user->name }}</a>
                    <div class="metadata">
                    <span class="date">
                        @if($comment->created_at->diffInSeconds(carbon()->now()) < 40)
                            Just now
                        @else
                            {{ carbon()->now()->sub($comment->created_at->diff(carbon()->now()))->diffForHumans() }}
                        @endif
                    </span>
                    </div>
                    <div class="text">
                        {!! nl2br($comment->comment) !!}
                    </div>
                    <div class="actions">
                        <a class="clickReply reply">Reply</a>
                        @if($currentModel->comments->where('parent_id', $comment->id)->count())
                            <a class="viewMore reply">
                                View Replies
                                <span class="ui teal circular label">{{ $currentModel->comments->where('parent_id', $comment->id)->count() }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <form action="{{ route('comments.add', [$currentModel->id]) }}" class="ui reply form" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="current_model" value="{{ str_replace('App\\', '', $model) }}">
        <div class="field">
            <textarea name="comment" placeholder="Comment"></textarea>
        </div>
        <button type="submit" class="ui blue labeled submit icon button">
            <i class="icon edit"></i> Add Comment
        </button>
    </form>
</div>

<input type="hidden" name="model" value="{{ str_replace('App\\', '', $model) }}" >
<div class="formTemplate hidden">
    <div class="ui comments">
        <form action="{{ route('comments.add', [$currentModel->id]) }}" class="ui reply form" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="current_model" value="{{ str_replace('App\\', '', $model) }}">
            <input type="hidden" name="parent_id">
            <div class="field">
                <textarea name="comment" placeholder="Comment"></textarea>
            </div>
            <button type="submit" class="ui blue labeled submit icon button">
                <i class="icon edit"></i> Add Comment
            </button>
        </form>
    </div>
</div>
<div class="commentHolderTemplate hidden">
    <div class="ui comments threaded">
    </div>
</div>
<div class="commentTemplate hidden">
    <div class="comment" data-id="">
        <a class="avatar">
            <img src="">
        </a>
        <div class="content">
            <a class="author"></a>
            <div class="metadata">
                <span class="date"></span>
            </div>
            <div class="text"></div>
            <div class="actions">
                <a class="clickReply reply">Reply</a>
                <a class="viewMore reply">
                    View Replies
                    <span class="ui teal circular label">1</span>
                </a>
            </div>
        </div>
    </div>
</div>