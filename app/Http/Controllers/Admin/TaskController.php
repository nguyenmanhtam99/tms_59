<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $tasks = Task::where('subject_id', $id)->get();

        return view('admin.task.index', compact('tasks', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.task.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCreateRequest $request, $id)
    {
        $arrayName = $request->task_name;
        $arrayDesc = $request->task_description;

        $tasks = [];
        foreach ($arrayName as $key => $name) {
            $tasks[] = [
                'name' => $arrayName[$key]['name'],
                'description' => $arrayDesc[$key]['description'],
                'subject_id' => $id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        Task::insert($tasks);

        return redirect()->action('Admin\TaskController@index', $id)->withSuccess(trans('session.task_create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $task_id)
    {
        $tasks = Task::where('subject_id', $id)->paginate(config('paginate.items_per_page'));
        $task = Task::find($task_id);

        if (!$task) {
            return redirect()->action('Admin\TaskController@index')
                ->withErrors(['message' => trans('task.not_found')]);
        }

        return view('admin.task.edit', compact('tasks', 'task', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskUpdateRequest $request, $id, $task_id)
    {
        $task = Task::find($task_id);

        if (!$task) {
            return redirect()->action('Admin\TaskController@index')
                ->withErrors(['message' => trans('task.not_found')]);
        }

        $task->name = $request->name;
        $task->description = $request->description;
        $task->subject_id = $id;
        $task->save();

        return redirect()->action('Admin\TaskController@index', $id)->withSuccess(trans('session.task_update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $task_id)
    {
        $task = Task::find($task_id);

        if (!$task) {
            return redirect()->action('Admin\TaskController@index', $id)
                ->withErrors(['message' => trans('task.not_found')]);
        }
        
        $task->delete();

        return redirect()->action('Admin\TaskController@index', $id)->withSuccess(trans('session.task_delete_success'));
    }
}
