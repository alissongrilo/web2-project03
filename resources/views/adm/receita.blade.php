@extends('adm.layout')

@section('content')

<a href="{{url('receita/create')}}" class="button">Adicionar</a>
<table>
  <thead>
    <tr>
      <th>Ingrediente</th>
      <th>Modo de preparo</th>
      <th>Editar</th>
      <th>Remover</th>
    </tr>
  </thead>
  <tbody>

    @foreach($receitas as $receita)
    <tr>
      <td>{{$receita->user->name}}</td>
      <td>{{$receita->ingrediente}}</td>
      <td>{{$receita->modo_de_preparo}}</td>

      <td>
        <a href="{{route('receita.edit',$receita->id)}}" class="button">
          Editar
        </a>
      </td>
      <td>
        <form method="POST" action="{{route('receita.destroy',$receita->id)}}" onsubmit="return confirm('tem certeza?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="button">
            Remover
          </button>
        </form>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>


@endsection