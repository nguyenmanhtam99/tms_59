<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Requests\TraineeCreateRequest;
use App\Http\Requests\TraineeUpdateRequest;
use App\Http\Controllers\Controller;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', config('user.roles.user'))->get();

        return view('admin.trainee.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trainee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TraineeCreateRequest $request)
    {
        $input = $request->all();

        $user = new User;

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = bcrypt($input['password']);

        if (!$user->save()) {
            return redirect()->action('Admin\TraineeController@index')
                ->withErrors(['message' => trans('trainee.trainee_create_error')]);
        }

        return redirect()->action('Admin\TraineeController@index')->withSuccess(trans('session.trainee_create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $roleOptions = User::getRoleOptions();

        if (!$user) {
            return redirect()->action('Admin\TraineeController@index')
                ->withErrors(['message' => trans('trainee.not_found')]);
        }

        return view('admin.trainee.edit', ['user' => $user, 'role' => $roleOptions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TraineeUpdateRequest $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->action('Admin\TraineeController@index')
                ->withErrors(['message' => trans('trainee.not_found')]);
        }

        $user->name = $request->name;
        $user->role = $request->role;
        $user->information = $request->information;

        if (!$user->save()) {
            return redirect()->action('Admin\TraineeController@index')
                ->withErrors(['message' => trans('trainee.trainee_edit_error')]);
        }

        if ($request->role == config('user.roles.admin')) {
            return redirect()->action('Admin\TraineeController@index')->withSuccess(trans('session.trainee_update_admin'));
        }

        return redirect()->action('Admin\TraineeController@index')->withSuccess(trans('session.trainee_update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->action('Admin\TraineeController@index')
                ->withErrors(['message' => trans('trainee.not_found')]);
        }

        if (!$user->delete()) {
            return redirect()->action('Admin\TraineeController@index')
                ->withErrors(['message' => trans('trainee.trainee_delete_error')]);
        }

        return redirect()->action('Admin\TraineeController@index')->withSuccess(trans('session.trainee_delete'));
    }
}
