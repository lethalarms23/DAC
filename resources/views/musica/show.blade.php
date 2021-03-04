@extends ('layout')
@section('header')
Livros
@endsection
@section('conteudo')
ID:{{$musica->id_musica}}<br>
Título:{{$musica->titulo}}<br>
Autor:{{$musica->autor}}<br>

@if(!is_null($musica->link))
Link: 
<br>
<iframe width="560" height="315" src="{{$musica->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
@else
<div class="alert alert-danger" role="alert">
    <h3>Link não definido</h3>
</div>
@endif
<br>
@endsection