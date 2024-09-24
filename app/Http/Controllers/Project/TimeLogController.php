<?php

namespace App\Http\Controllers\Project;

use App\Events\Project\TimeLogCreated;
use App\Events\Project\TimeLogDeleted;
use App\Http\Controllers\Controller;
use App\Http\Requests\TimeLog\StoreTimeLogRequest;
use App\Models\Project;
use App\Models\TimeLog;
use Illuminate\Http\JsonResponse;

class TimeLogController extends Controller
{
    public function startTimer(Project $project): JsonResponse
    {
        $this->authorize('create', [TimeLog::class, $project]);

        $timeLog = $project->timeLogs()->create([
            'user_id' => auth()->id(),
            'minutes' => null,
            'timer_start' => now()->timestamp,
        ]);

        return response()->json(['timeLog' => $timeLog->load(['user:id,name'])]);
    }

    public function stopTimer(Project $project, TimeLog $timeLog): JsonResponse
    {
        $this->authorize('create', [TimeLog::class, $project]);

        $timeLog->update([
            'timer_stop' => now()->timestamp,
            'minutes' => round((now()->timestamp - $timeLog->timer_start) / 60),
        ]);

        TimeLogCreated::dispatch($project, $timeLog);

        return response()->json(['timeLog' => $timeLog->load(['user:id,name'])]);
    }

    public function store(StoreTimeLogRequest $request, Project $project): JsonResponse
    {
        $this->authorize('create', [TimeLog::class, $project]);

        $timeLog = $project->timeLogs()->create(
            $request->validated() + ['user_id' => auth()->id()]
        );

        TimeLogCreated::dispatch($project, $timeLog);

        return response()->json(['timeLog' => $timeLog->load(['user:id,name'])]);
    }

    public function destroy(Project $project, TimeLog $timeLog): JsonResponse
    {
        $this->authorize('delete', [$timeLog, $project]);

        $timeLog->delete();

        TimeLogDeleted::dispatch($project, $timeLog->id);

        return response()->json();
    }
}
