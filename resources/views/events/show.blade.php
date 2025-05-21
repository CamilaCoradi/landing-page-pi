@extends('layouts.main')
@section('title', $event->title)
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/events/{{$event->image}}" class="img-fluid" alt="{{$event->title}}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$event->title}}</h1>
            <p> <i class="fa-solid fa-location-dot"></i> {{$event->city}}</p>
            <p class="events-participants"><i class="fa-solid fa-people-group"></i> {{count($event->users)}} participantes</p>
            <p class="event-owner"><i class="fa-regular fa-star"></i> {{$eventOwner['name']}}</p>
            @if(!$hasUserJoined)
            <form action="/events/join/{{ $event->id }}" method="POST">
                @csrf
                <a href="/events/join/{{ $event->id }}" 
                    class="btn btn-primary" id="event-submit"
                    onclick="event.preventDefault()
                    this.closest('form').submit()">
                    Confirmar Presença
                </a>
            </form>
            @else
                <p class="already-joined-msg">Você já está participando deste evento!</p>
            @endif
            <h3>O evento conta com:</h3>
            <ul id=items-list>
                @foreach($event->items as $item)
                <li><i class="fa-regular fa-circle-right"></i><span>{{$item}}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o evento:</h3>
            <p class="event-description">{{$event->description}}</p>
        </div>
    </div>
</div>
@endsection