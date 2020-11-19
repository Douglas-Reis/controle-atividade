@extends('admin.layouts.app')
@section('content')
    <h1>Editando a atividade 
        <strong>{{$activity->name}}</strong>
    </h1>

    <form action="{{route('activities.update', $activity->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.pages.activities._portials.form')
    </form>
@endsection