@extends('admin.index')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3> {{ trans('course.title') }} <small>&raquo; {{ trans('course.edit_course') }}</small></h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> {{ trans('course.title_edit') }} </h3>
                </div>
                <div class="panel-body">

                    @include('layouts.partials.error')
                    @include('layouts.partials.success')

                    {!! Form::model($course, ['method' => 'PUT', 'route' => ['admin.course.update', $course['id']], 'class' => 'form-horizontal']) !!}
                        {!! Form::label('name', trans('course.name'), ['class' => 'control-label']) !!}
                        {!! Form::text('name', $value = $course['name'], ['class' => 'form-control', 'autofocus']) !!}

                        {!! Form::label('description', trans('course.description'), ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', $value = $course['description'], ['class' => 'form-control', 'rows' => '3']) !!}

                        <div class="block"></div>
                        
                        {!! Form::button('<i class="fa fa-edit"></i>&nbsp;' . trans('course.save_changes'), ['type' => 'submit', 'class' => 'btn btn-primary btn-md']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop
