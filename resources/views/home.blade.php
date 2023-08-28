@extends('adminlte::page')

@section('title', 'MODULO DE CONTROL')

@section('content_header')
    
@stop

@section('content')

    <div id="portada" style="text-align:center">
        <img src='vendor/adminlte/dist/img/portada.png' width="900" height="500" >
    </div>
   
   
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop