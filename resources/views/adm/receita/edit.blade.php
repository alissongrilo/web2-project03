@extends('adm.layout')

@section('content')
@if(count($errors) > 0)
<ul>
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif
<form method="POST" action="{{url('receita', $receita->id)}}">
  @csrf
  @method('PUT')
  <div class="row">
    <label class="col-2" for="user">Usuário</label>
    <select class="col-5" name="user_id" id="user">
      <option></option>
      @foreach($users as $user)
      <option value="{{$user->id}}" @if($user->id==old('user_id')) selected
        @elseif ($user->id==$receita->user_id) selected
        @endif
        >
        {{$user->name}}
      </option>
      @endforeach
    </select>

    <label class="col-2" for="ingrediente">Ingrediente</label>
    <input type="text" name="ingrediente" id="ingrediente" class="col-3" value="{{ $receita->ingrediente }}" />
    <label class="col-2" for="modo_de_preparo">Modo de Preparo</label>
    <input type="text" name="modo_de_preparo" id="modo_de_preparo" class="col-3" value="{{ $receita->modo_de_preparo }}" />
  
    <button type="submit" class="button">Salvar</button>
</form>
@endsection