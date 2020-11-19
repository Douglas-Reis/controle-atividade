@extends('admin.layouts.app')
@section('content')
<h1><a href="{{route('activities.index')}}"> << </a>Detalhes da atividade</h1>

<ul>
    <li><strong>Nome: </strong>{{$activity->name}}</li>
    <li><strong>Descrição: </strong>{{$activity->description}}</li>
</ul>

<form action="{{route('activities.destroy', $activity->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Excluir atividade "{{$activity->name}}"</button>
</form>
@endsection