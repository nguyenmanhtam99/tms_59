@extends('admin.index')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3> {{ trans('subject.title') }} <small>&raquo; {{ trans('subject.create_subject') }}</small></h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> {{ trans('subject.title_new') }} </h3>
                </div>
                <div class="panel-body">

                    @include('layouts.partials.error')
                    @include('layouts.partials.success')

                    {!! Form::open(['method' => 'POST', 'route' => ['admin.subject.store'], 'class' => 'form-horizontal']) !!}
                        {!! Form::label('name', trans('subject.name'), ['class' => 'control-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'autofocus']) !!}

                        {!! Form::label('description', trans('subject.description'), ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) !!}

                        <div class="block"></div>
                        
                        {!! Form::button('<i class="fa fa-plus-circle"></i>&nbsp;' . trans('subject.add'), ['type' => 'submit', 'class' => 'btn btn-primary btn-md']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop
