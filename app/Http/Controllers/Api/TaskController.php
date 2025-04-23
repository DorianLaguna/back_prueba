<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::where('user_id', $request->user()->id);

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        return response()->json($query->get());
    }

    public function store(TaskStoreRequest $request)
    {
        $task = Task::create(array_merge($request->validated(), ['user_id' => Auth::id()]));

        return response()->json($task, 201);
    }

    public function show($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return response()->json($task);
    }

    public function update(TaskUpdateRequest $request, $id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $task->update($request->validated());

        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully.']);
    }
}
