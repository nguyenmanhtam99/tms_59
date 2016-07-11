@extends('admin.index')

@section('title')
    {{ trans('course.title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-8"></div>
                <div class="input-group col-md-4">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon"> {{ trans('course.search') }} </span>
                </div>
                <br>
                <div class="col-md-6">
                    <h3> {{ trans('course.courses') }} <small>&raquo; {{ trans('course.listing') }} </small></h3>
                </div>
                <div class="col-md-6 text-right">
                    {!! Form::open(['method' => 'GET', 'route'=> ['admin.course.create']]) !!}
                        {!! Form::submit(trans('course.new_course'), ['class' =>'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('course.course_table') }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            @include('layouts.partials.error')
                            @include('layouts.partials.success')

                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll"></th>
                                            <th> {{ trans('course.id') }} </th>
                                            <th> {{ trans('course.course_name') }} </th>
                                            <th> {{ trans('course.description') }} </th>
                                            <th> {{ trans('course.created_at') }} </th>
                                            <th> {{ trans('course.updated_at') }}</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td><input type="checkbox" name="checkbox[]" value=" {{$course->id}} "></td>
                                                <td>{{ $course->id }}</td>
                                                <td>{{ $course->name }}</td>
                                                <td>{{ $course->description }}</td>
                                                <td>{{ $course->created_at }}</td>
                                                <td>{{ $course->updated_at }}</td>
                                                <td>
                                                    {!! Form::open(['method' => 'GET', 'route'=> ['admin.course.show', $course->id]]) !!}
                                                        {!! Form::submit(trans('course.view_details'), ['class' =>'btn btn-success btn-sm']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                                <td>
                                                    {!! Form::open(['method' => 'GET', 'route'=> ['admin.course.edit', $course->id]]) !!}
                                                        {!! Form::submit(trans('course.edit'), ['class' =>'btn btn-primary btn-sm']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route'=>['admin.course.destroy', $course->id]]) !!}
                                                        {!! Form::submit(trans('course.delete'), ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure delete?')"]) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                </div>
                <div class="col-lg-8">
                    {!! $courses->render() !!}
                </div>
            </div>
        </section>
    </div>
@stop

