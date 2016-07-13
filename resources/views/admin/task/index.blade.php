@extends('admin.index')

@section('title')
    {{ trans('task.title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> {{ trans('task.title_new') }} </h3>
                        </div>

                        <div class="panel-body">

                            {!! Form::open(['method' => 'POST', 'route' => ['admin.subject.{id}.tasks.store', $id], 'class' => 'form-horizontal']) !!}
                                <div class="form-group">
                                    {!! Form::button('<i class="fa fa-plus"></i>&nbsp;' . trans('task.add'), ['type' => 'button', 'class' => 'btn btn-primary btn-sm','id' => 'addTask']) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i>&nbsp;' . trans('task.remove'), ['type' => 'button', 'class' => 'btn btn-danger btn-sm', 'id' => 'removeTask']) !!}
                                </div>
                                
                                <div class="addRow">
                                    <div class="form-group">
                                        {!! Form::label('name', trans('task.name'), ['class' => 'control-label']) !!}
                                        {!! Form::text('task_name[][name]', null, ['class' => 'form-control', 'autofocus']) !!}
                                    </div> 

                                    <div class="form-group"> 
                                        {!! Form::label('description', trans('task.description'), ['class' => 'control-label']) !!}
                                        {!! Form::textarea('task_description[][description]', null, ['class' => 'form-control', 'rows' => '3']) !!}
                                    </div>
                                </div>

                                <div class="task"></div>

                                <div class="form-group">
                                    {!! Form::button('<i class="fa fa-edit"></i>&nbsp;' . trans('task.save'), ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']) !!}
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

