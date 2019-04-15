@extends('layouts.app')

@section('title', 'Trainers')

@section('content')
@include('common.success')

<div class="row">
    @foreach ($trainers as $trainer)


        <div class="col-sm">
            <div class="card text-center" style="width: 18rem; margin-top:40px;">
                <img class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="" style="width: 200px; height: 200px; background-color: #EFEFEF; margin: 20px;">
                <div class="card-body">
                    <h4 class="card-title">{{$trainer->name}}</h4>
                    <p class="card-text">{{$trainer->description}}</p>
                    <a class="btn btn-primary" href="trainers/{{$trainer->slug}}" role="button">Ver más</a>
                </div>
            </div>
        </div>



    @endforeach
</div>

@endsection
