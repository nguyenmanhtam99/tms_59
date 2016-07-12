@extends('index')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3> {{ trans('user.report') }} <small>&raquo; {{ trans('user.read_report') }}</small></h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> {{ trans('user.form_report') }} </h3>
                </div>
                <div class="panel-body">

                    @include('layouts.partials.error')
                    @include('layouts.partials.success')

                    {!! Form::open(['method' => 'POST', 'route' => ['storeReport', Auth::user()->id], 'class' => 'form-horizontal']) !!}

                        {!! Form::label('achivement', trans('user.achivement'), ['class' => 'control-label']) !!}
                        {!! Form::text('achivement', null, ['class' => 'form-control', 'autofocus']) !!}

                        {!! Form::label('next_plan', trans('user.next_plan'), ['class' => 'control-label']) !!}
                        {!! Form::text('next_plan', null, ['class' => 'form-control', 'autofocus']) !!}

                        {!! Form::label('problem', trans('user.problem'), ['class' => 'control-label']) !!}
                        {!! Form::text('problem', null, ['class' => 'form-control', 'autofocus']) !!}

                        <div class="block"></div>

                        {!! Form::button('<i class="fa fa-plus-circle"></i>&nbsp;' . trans('user.summit'), ['type' => 'submit', 'class' => 'btn btn-primary btn-md']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop
