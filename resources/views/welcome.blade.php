@extends('layouts.main')
@section('title', 'Active Week')
@section ('content')           
       <div id="search-container" class="col-md-12">
           <h1>Busque uma atividade</h1> 
           <form action="/" method="GET">
              <input type="text" name="search" id="search" class="form-control" placeholder="Procurar...">
              </form>  
       </div>
       <div id="events-container" class="col-md-12">
              @if($search)
                     <h2>Buscando por: {{$search}}</h2>
              @else
                     <h2>Próximas Atividades</h2>
                     <p class="subtitle">Veja as atividades dos próximos dias</p>
              @endif
              <div id="cards-container" class="row">
                     @foreach ($events as $event)
                         <div class="col-md-3">
                            <div class="card">
                            <img src="/img/events/{{$event->image}}" alt="{{ $event->title }}">
                            <div class="card-body">
                                   <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                                   <h5 class="card-title">{{$event->title}}</h5>
                                   <p class="card-participants">{{count($event->users)}} Participantes</p>
                                   <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
                            </div>
                            </div>
                         </div>
                     @endforeach
                     @if(count($events) == 0 && $search)
                     <p>Não foi possível encontrar nenhuma atividade com {{$search}}! <a href="/">Ver todas</a></p>
                     @elseif(count($events) == 0)
                     <p>Não há atividades diponíveis</p>
                     @endif
              </div>
       </div>       
@endsection