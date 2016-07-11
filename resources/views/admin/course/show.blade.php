@extends('admin.index')

@section('title')
    {{ trans('course.title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-6">
                    <h3> {{ trans('course.courses') }} <small>&raquo; {{ trans('course.view_details') }} </small></h3>
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
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tbody>
                                        <tr>
                                            <th> {{ trans('course.name') }} </th>
                                            <td>{{ $course['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('course.description') }} </th>
                                            <td>{{ $course['description'] }}</td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('course.created_at') }}</th>
                                            <td>{{ $course['created_at'] }}</td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('course.updated_at') }} </th>
                                            <td>{{ $course['updated_at'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                {!! Form::open(['method' => 'GET', 'route'=> ['course.subject', $course['id']]]) !!}
                                        {!! Form::submit(trans('course.view_subjects'), ['class' =>'btn btn-success']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

