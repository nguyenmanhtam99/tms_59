@extends('admin.index')

@section('title')
    {{ trans('subject.title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row page-title-row">
                <div class="col-md-6">
                    <h3> {{ trans('subject.subjects') }} <small>&raquo; {{ trans('subject.view_details') }} </small></h3>
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
                                    <tbody>
                                        <tr>
                                            <th> {{ trans('subject.name') }} </th>
                                            <td>{{ $subject['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('subject.description') }} </th>
                                            <td>{{ $subject['description'] }}</td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('subject.created_at') }}</th>
                                            <td>{{ $subject['created_at'] }}</td>
                                        </tr>
                                        <tr>
                                            <th> {{ trans('subject.updated_at') }} </th>
                                            <td>{{ $subject['updated_at'] }}</td>
                                        </tr>
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

