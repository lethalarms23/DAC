@extends('layout')
@section('header')
Musicas
@endsection
@section('titulo-pagina')
Livros
@endsection
@section('conteudo')
<table class="table table-dark table-striped">
  <tbody>
  <tr>
  @foreach($musicas as $musica)
    <tr>
    <td>{{$musica->id_musica}} </td>
    <td>{{$musica->titulo}} </td>
    <td>{{$musica->autor}} </td>
    <!-- <td>
    @if(!is_null($musica->link))
    <video controls width="200">
    <source src="{{$musica->link}}">
    </video>
    </td> 
    @endif-->
    </tr>
  @endforeach
    </tr>
  </tbody>
</table>

@if(auth()->check())
<a href="{{route('musica.create')}}" class="btn btn-secondary" role="button"><i class="fas fa-plus"></i></a>
@endif
@endsection