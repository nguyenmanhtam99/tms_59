<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        
        return view('admin.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $subject = new Subject();
        $requestAll = $request->all();
        $subject->create($requestAll);

        return redirect()->action('Admin\SubjectController@index')->withSuccess(trans('session.subject_create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return redirect()->action('Admin\SubjectController@index')
                ->withErrors(['message' => trans('subject.not_found')]);
        }

        return view('admin.subject.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return redirect()->action('Admin\SubjectController@index')
                ->withErrors(['message' => trans('subject.not_found')]);
        }

        return view('admin.subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return redirect()->action('Admin\SubjectController@index')
                ->withErrors(['message' => trans('subject.not_found')]);
        }

        $requestAll = $request->all();
        $subject->update($requestAll);

        return redirect()->action('Admin\SubjectController@index')->withSuccess(trans('session.subject_update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return redirect()->action('Admin\SubjectController@index')
                ->withErrors(['message' => trans('subject.not_found')]);
        }
        
        $subject->delete();

        return redirect()->action('Admin\SubjectController@index')->withSuccess(trans('session.subject_delete_success'));
    }
}
