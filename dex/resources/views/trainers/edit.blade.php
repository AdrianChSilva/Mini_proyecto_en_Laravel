@extends('layouts.app')

@section('title', 'Trainer edit')

@section('content')
<form class="form-group" action="/trainers/{{$trainer->slug}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf<!-- Esto lo que hace es evitar que puedan introducir comandos maliciosos en los formularios -->
    <img class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="" style="width: 200px; height: 200px; background-color: #EFEFEF; margin: 20px;">

    <div class="form-group">
        <label for="">Nombre(*)</label>
    <input type="text" name="name" id="" class="form-control" value="{{$trainer->name}}" aria-describedby="helpId">
        <small id="helpId" class="text-muted">Actualizar nombre</small>
    </div>

    <div class="form-group">
        <label for="">Descripción</label>
        <input type="text" name="description" id="" class="form-control" value="{{$trainer->description}}" aria-describedby="helpId">
        <small id="helpId" class="text-muted">Actualizar descripción</small>
    </div>

    <div class="form-group">
        <label for="">Avatar</label>
        <input type="file" name="avatar" value="{{$trainer->avatar}}">
        <small id="helpId" class="text-muted">{{$trainer->avatar}}</small>
    </div>
    


    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>


@endsection