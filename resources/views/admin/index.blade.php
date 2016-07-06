@extends('layouts.app')

@section('navbar')
    <li> {{ Html::linkRoute('admin.course.index', trans('course.title')) }} </li>
@stop
