@extends('layouts.main')
@section('title', 'Criar Evento')
@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie sua Atividade</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
             <div class="form-group">
                <label for="image">Imagem da Atividade:</label>
                <input type="file" id="image" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome da atividade">
            </div>
            <div class="form-group">
                <label for="date">Data do Evento:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local da atividade">
            </div>
            <div class="form-group">
                <label for="title">A atividade é privada?</label>
                <select name="private" id="private" class="form-control">
                  <option value="0">Não</option>
                  <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control"></textarea>
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
            <input type="submit" class="btn btn-primary" value="Criar Atividade">
        </form>
    </div>
@endsection
