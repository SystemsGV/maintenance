<?php

namespace App\Http\Controllers\Task;

use App\Events\Task\CommentCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Cache;

class CommentController extends Controller
{
    public function index(Project $project, Task $task)
    {
        $this->authorize('viewAny', [Comment::class, $project]);
        Cache::flush();

        return response()->json(
            $task->comments()->with(['user:id,name,avatar,job_title'])->latest()->get(),
        );
    }

    public function store(StoreCommentRequest $request, Project $project, Task $task)
    {
        $this->authorize('create', [Comment::class, $project]);

        $comment = $task->comments()->create(
            $request->validated() + ['user_id' => auth()->id()]
        );

        CommentCreated::dispatch($comment);
        Cache::flush();

        return response()->json(['comment' => $comment->load(['user:id,name,avatar,job_title'])]);
    }
}
