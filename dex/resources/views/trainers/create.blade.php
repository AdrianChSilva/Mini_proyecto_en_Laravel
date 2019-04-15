@extends('layouts.app')

@section('title', 'Trainers create')

@section('content')

@include('common.errors')

<form class="form-group" action="/trainers" method="POST" enctype="multipart/form-data">
    @csrf<!-- Esto lo que hace es evitar que puedan introducir comandos maliciosos en los formularios -->
    @include('trainers.form')
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection