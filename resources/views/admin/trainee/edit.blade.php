@extends('admin.index')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3> {{ trans('trainee.title') }} <small>&raquo; {{ trans('trainee.create_trainee') }}</small></h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> {{ trans('trainee.trainee_title_form') }} </h3>
                </div>
                <div class="panel-body">

                    @include('layouts.partials.error')
                    {!! Form::open(array('route' => ['admin.trainee.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal')) !!}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {!! Form::label('name', trans('trainee.trainee_name'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('name', $user->name, array('class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            {!! Form::label('email', trans('trainee.trainee_email'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::email('email', $user->email, ['class' => 'form-control', 'disabled']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('information', trans('trainee.trainee_information'), array('class' => 'col-md-4 control-label')) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('information', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                            {!! Form::label('role', trans('trainee.trainee_role'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                <label>{!! Form::select('role', $role, $user->role, ['class' => 'form-control']) !!}</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::button('<i class="fa fa-btn fa-user"></i> ' . trans("trainee.update"), ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                                <a href="{{ route('admin.trainee.index') }}" class="btn btn-success"><i class="fa fa-chevron-circle-left"></i> {{ trans("trainee.back") }}</a>
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop
