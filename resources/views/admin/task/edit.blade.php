@extends('admin.index')

@section('content')
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-8"></div>
                <div class="input-group col-md-4">
                    <input type="text" class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-addon"> {{ trans('task.search') }} </span>
                </div>
                <br>
                <div class="col-md-12 text-right">
                    {!! Form::open(['method' => 'GET', 'route' => ['admin.subject.{id}.tasks.index', $id]]) !!}
                        {!! Form::submit(trans('task.new_task'), ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> {{ trans('task.title_edit') }} </h3>
                        </div>

                        <div class="panel-body">

                            @include('layouts.partials.error')
                            @include('layouts.partials.success')

                            {!! Form::model($task, ['method' => 'PUT', 'route' => ['admin.subject.{id}.tasks.update', $id, $task['id']], 'class' => 'form-horizontal']) !!}
                                <div class="form-group">
                                    {!! Form::label('name', trans('task.name'), ['class' => 'control-label']) !!}
                                    {!! Form::text('name', $task['name'], ['class' => 'form-control', 'autofocus']) !!}
                                </div> 

                                <div class="form-group">
                                    {!! Form::label('description', trans('task.description'), ['class' => 'control-label']) !!}
                                    {!! Form::textarea('description', $task['description'], ['class' => 'form-control', 'rows' => '3']) !!}
                                </div>
                                
                                <div class="form-group">
                                    {!! Form::button('<i class="fa fa-edit"></i>&nbsp;' . trans('task.save_changes'), ['type' => 'submit', 'class' => 'btn btn-primary btn-md']) !!}
                                </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>

                @include('admin.task._form')

            </div>
        </section>
    </div>
@stop
