@extends('layouts.app')

@section('navbar')
    <li> {{ Html::linkRoute('admin.course.index', trans('course.title')) }} </li>
    <li> {{ Html::linkRoute('admin.subject.index', trans('subject.title')) }} </li>
    <li> {{ Html::linkRoute('admin.trainee.index', trans('trainee.title')) }} </li>
@stop
