@extends('index')

@section('title')
    {{ trans('user.title') }}
@stop

@section('content')
    <div class="container">
        <section>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> {{ trans('user.profile') }} </h3>
                        </div>
                        <div class="panel-body">

                            @include('layouts.partials.error')
                            @include('layouts.partials.success')

                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <tr>
                                        <td>{!! Html::image($user->avatar(), null, ['class' => 'img-responsive img']) !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('user.name') }}</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('user.email') }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('user.information') }}</td>
                                        <td>{{ $user->information }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ trans('user.role') }}</td>
                                        <td>
                                            @if ($user->isAdmin())
                                                {{ trans('user.admin') }}
                                            @else
                                                {{ trans('user.user') }}
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                {!! Form::open(['method' => 'GET', 'route' => ['user.edit', $user->id]]) !!}
                                {!! Form::submit(trans('user.edit_profile'), ['class' => 'btn btn-success btn-sm']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="panel-heading">
                    <h3> {{ trans('user.title') }} <small>&raquo; {{ trans('user.manager_history') }} </small></h3>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('user.subject') }}
                        </div>
                        <div class="panel-body">

                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                    <tr>
                                        <th> {{ trans('subject.subject_name') }} </th>
                                        <th> {{ trans('subject.description') }} </th>
                                        <th> {{ trans('subject.started_date') }} </th>
                                        <th> {{ trans('subject.ended_date') }} </th>
                                        <th> {{ trans('subject.status') }} </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user->subjects as $subject)
                                        <tr>
                                            <td>{{ $subject->name}}</td>
                                            <td>{{ $subject->description }}</td>
                                            <td>{{ Carbon\Carbon::createFromTimeStamp(strtotime($subject->pivot->started_date))->diffForHumans() }}</td>
                                            <td>{{ Carbon\Carbon::createFromTimeStamp(strtotime($subject->pivot->ended_date))->diffForHumans() }}</td>
                                            <td> @if($subject->pivot->status == config('user.status.start'))
                                                    {{ trans('subject.start') }}
                                                @elseif($subject->pivot->status == config('user.status.working'))
                                                    {{ trans('subject.working') }}
                                                @else
                                                    {{ trans('subject.finish') }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ trans('user.course') }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables">
                                    <thead>
                                    <tr>
                                        <th> {{ trans('course.course_name') }} </th>
                                        <th> {{ trans('course.description') }} </th>
                                        <th> {{ trans('course.started_date') }} </th>
                                        <th> {{ trans('course.ended_date') }} </th>
                                        <th> {{ trans('course.status') }} </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user->courses as $course)
                                        <tr>
                                            <td>{{ $course->name}}</td>
                                            <td>{{ $course->description }}</td>
                                            <td>{{ Carbon\Carbon::createFromTimeStamp(strtotime($course->pivot->started_date))->diffForHumans() }}</td>
                                            <td>{{ Carbon\Carbon::createFromTimeStamp(strtotime($course->pivot->ended_date))->diffForHumans() }}</td>
                                            <td> @if($course->pivot->status == config('user.status.start'))
                                                    {{ trans('subject.start') }}
                                                @elseif($course->pivot->status == config('user.status.working'))
                                                    {{ trans('subject.working') }}
                                                @else
                                                    {{ trans('subject.finish') }}
                                                @endif
                                            </td>
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


