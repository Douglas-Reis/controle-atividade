@extends('admin.layouts.app')
@section('content')
    <h1>
        Todas as atividade
        <a href="{{route('activities.create')}}" class="btn btn-primary">Nova atividade</a>
    </h1>

    <hr>

    <form action="{{route('activities.search')}}" method="post" class="form form-inline">
        @csrf
    <input type="text" name="filter" placeholder="Filtrar: " class="form-control" value="{{$filters['filter'] ?? ''}}">
        <button type="submit" class="btn btn-primary">Pesquisar</button>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th width='100'>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $activity)
                <tr>
                    <td>{{$activity->name}}</td>
                    <td>
                        <a href="{{route('activities.edit', $activity->id)}}">Editar</a>
                        <a href="{{route('activities.show', $activity->id)}}">Detalhes</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (isset($filters))
            {!!$activities->appends($filters)->links()!!}
        @else
            {!!$activities->links()!!}
    @endif
@endsection
