@extends('layouts.app')

@section('title', 'Trainer')

@section('content')

@include('common.success')
    <img class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="" style="width: 200px; height: 200px; background-color: #EFEFEF; margin: 20px;">
        <div class="text-center">  
            <h4>{{$trainer->name}}</h4>
            <p>{{$trainer->description}}</p>
            <a class="btn btn-primary" href="/trainers/{{$trainer->slug}}/edit" role="button">Editar</a>
            <form method="POST" action="/trainers/{{$trainer->slug}}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
    
                <div class="form-group">
                  <input type="submit" class="btn btn-danger" value="Eliminar">
                </div>
            </form>

         </div>
         <modal-button></modal-button>
         <create-form-pokemon></create-form-pokemon>



@endsection