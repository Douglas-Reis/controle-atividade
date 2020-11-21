@extends('admin.layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>  
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <a href="{{url('/activities')}}">
                        <b>Minhas atividades</b>
                    </a>   
                </div>
                <div class="col-sm">
                    <a href="{{url('/open')}}">
                        <b>Abertas</b>
                    </a>
                </div>
                <div class="width .col-sm">
                    <a href="{{url('/closed')}}">
                        <b>Concluídas</b>
                    </a>
                </div>
            </div>
        </div>
    </body>
    </html>
@endsection 