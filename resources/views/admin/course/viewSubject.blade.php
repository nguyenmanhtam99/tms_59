@extends('admin.index')

@section('title')
    {{ trans('subject.title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-6">
                    <h3> {{ trans('course.title') }} <small>&raquo; {{ trans('course.view_subjects') }} </small></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('subject.subject_table') }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                     <thead>
                                        <tr>
                                            <th> {{ trans('subject.id') }} </th>
                                            <th> {{ trans('subject.subject_name') }} </th>
                                            <th> {{ trans('subject.description') }} </th>
                                            <th> {{ trans('subject.created_at') }} </th>
                                            <th> {{ trans('subject.updated_at') }} </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($course->subjects as $subject)
                                            <tr>
                                                <td>{{ $subject->id }}</td>
                                                <td>{{ $subject->name}}</td>
                                                <td>{{ $subject->description }}</td>
                                                <td>{{ $subject->created_at }}</td>
                                                <td>{{ $subject->updated_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop


