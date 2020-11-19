@extends('admin.layouts.app')

@section('content')
    <h1>Cadastrar nova atividade</h1>
    <form action="{{route('activities.store')}}" method="post" enctype="multipart/form-data" class="form">
        @include('admin.pages.activities._portials.form')
    </form>
@endsection