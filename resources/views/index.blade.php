@extends('layouts.app')

@section('navbar')
    <li> {{ Html::linkRoute('user.index', trans('user.title')) }} </li>
    <li> {{ Html::linkRoute('report', trans('user.report'), [ Auth::user()->id]) }} </li>
@stop
