@extends('layouts.main')
@section('title', 'Editando: ' . $event->title)
@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{ $event->title }}</h1>
        <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
             <div class="form-group">
                <label for="image">Imagem da Atividade:</label>
                <input type="file" id="image" name="image" class="form-control-file">
                <img src="/img/events/{{$event->image}}" alt="{{ $event->title }}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome da atividade" value="{{ $event->title }}">
            </div>
            <div class="form-group">
                <label for="date">Data do Evento:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{date('Y-m-d', strtotime($event->date));}}">
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local da atividade" value="{{ $event->city }}">
            </div>
            <div class="form-group">
                <label for="title">A atividade é privada?</label>
                <select name="private" id="private" class="form-control" value="{{ $event->private }}">
                  <option value="0">Não</option>
                  <option value="1" {{$event->private == 1 ? "selected='selected'" : ""}}>Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control">{{ $event->description }}</textarea>
            </div>
              <div class="form-group">
                <label for="title">Adicione itens de infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Espelho de parede"> Espelho de parede
                </div>
                 <div class="form-group">
                    <input type="checkbox" name="items[]" value="Sala de yoga/pilates"> Sala de yoga/pilates
                </div>
                 <div class="form-group">
                    <input type="checkbox" name="items[]" value="Tatame para artes marciais"> Tatame para artes marciais
                </div>
                 <div class="form-group">
                    <input type="checkbox" name="items[]" value="Pesos livres / halteres"> Pesos livres / halteres
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Colchonetes"> Colchonetes
                </div>
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Editar Evento">
        </form>
    </div>
@endsection
