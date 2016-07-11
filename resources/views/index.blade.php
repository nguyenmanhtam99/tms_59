@extends('layouts.app')

@section('navbar')
    <li> {{ Html::linkRoute('user.index', trans('user.title')) }} </li>
@stop
