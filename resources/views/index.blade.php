@extends('main')
@section('content')
<div class="container">
  <h1>Postar uma notícia</h1>
  <div class="form-group">
    <form v-on:submit.prevent="submit" method="post">
      <div class="row m-2">
        <input class="form-control" type="text" placeholder="Titulo" v-model="data.title" required>
      </div>
      <div class="row m-2">
        <input class="form-control" type="text" placeholder="descrição" v-model="data.summary" required>
      </div>
      <div class="row m-2">
        <textarea class="form-control" placeholder="Corpo da notícia" v-model="data.content" cols="30" row m-2s="10" required></textarea>
      </div>
      <br>
      <div class="row m-2">
      <label for="" class="label">Selecione uma Foto</label>
        <input class="form-control" type="file" v-on:change="processFile($event)" ref="inputFile" accept="image/x-png,image/gif,image/jpeg" required>
      </div>
      <div class="row m-2 mt-5">
      <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>
</div>
@endsection