<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Get List User
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(config('paginate.items_per_page'));

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * View Detail User
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->action('User\UserController@index')
                ->withErrors(['message' => trans('user.not_found')]);
        }

        return view('user.details', compact('user'));
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

        if (!$user) {
            return redirect()->action('User\UserController@index')
                ->withErrors(['message' => trans('user.not_found')]);
        }

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = sha1(time()) . '-' . $avatar->getClientOriginalName();
            $request->file('avatar')->move(base_path() . config('user.avatar_folder'), $filename);
            $user->avatar = $filename;
        }

        $requestAll = $request->all();
        $user->update($requestAll);

        return redirect()->action('User\UserController@index')->withSuccess(trans('session.course_update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
