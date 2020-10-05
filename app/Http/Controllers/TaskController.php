<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Project $taskList
     * @return JsonResponse|Response
     */
    public function index(Request $request, Project $taskList)
    {
        $tasks = Task::all();
        return response()->json($tasks)->setStatusCode(200, 'Successful task output');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|ResponseFactory|JsonResponse|Response
     */
    public function store(Request $request)
    {
        /**
         * @var Validator $validator
         */
        $validator = Validator::make($request->all(), [
            'task_name' => 'required|string|max:30',
            'description' => 'string|max:2046',
            'urgency' => 'nullable|boolean',
            'start_date' => 'nullable|date',
            'finish_date' => 'nullable|date',
            'finish_time' => 'nullable|date',
            'responsible' => 'required|string',
            'executors' => 'required|string',
            'column' => 'required|string',
            'attachment_1' => 'nullable|string',
            'attachment_2' => 'nullable|string',
            'attachment_3' => 'nullable|string',
            'link' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response($validator->messages(), 400);
        }

        /**
         * @var Task $task
         */
        $task = Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'urgency' => $request->urgency,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'finish_time' => $request->finish_time,
            'responsible' => $request->responsible,
            'executors' => $request->executors,
            'column' => $request->column,
            'attachment_1' => $request->attachment_1,
            'attachment_2' => $request->attachment_2,
            'attachment_3' => $request->attachment_3,
            'link' => $request->link
        ]);
        return response()->json($task)->setStatusCode(200, 'Successful task creation');
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return JsonResponse|Response|object
     */
    public function show(Task $task)
    {
        return response()->json($task)->setStatusCode(200, 'Successful current task output');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Task $task
     * @return JsonResponse|Response|object
     */
    public function update(Request $request, Task $task)
    {
        /**
         * @var Validator $validator
         */
        $validator = Validator::make($request->all(), [
            'task_name' => 'required|string|max:30',
            'description' => 'nullable|string|max:2046',
            'urgency' => 'nullable|boolean',
            'start_date' => 'nullable|date',
            'finish_date' => 'nullable|date',
            'finish_time' => 'nullable|date',
            'responsible' => 'required|string',
            'executors' => 'required|string',
            'column' => 'required|string',
            'attachment_1' => 'nullable|string',
            'attachment_2' => 'nullable|string',
            'attachment_3' => 'nullable|string',
            'link' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response($validator->messages(), 400);
        }

        $task->update([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'urgency' => $request->urgency,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'finish_time' => $request->finish_time,
            'responsible' => $request->responsible,
            'executors' => $request->executors,
            'column' => $request->column,
            'attachment_1' => $request->attachment_1,
            'attachment_2' => $request->attachment_2,
            'attachment_3' => $request->attachment_3,
            'link' => $request->link
            ]);
        return response()->json($task)->setStatusCode(200,'Successful task update');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     * @throws \Exception
     */
    public function destroy(Task $task)
    {
        if($task->delete()) {
            return response('Task successfully deleted', 200);
        }
    }
}
