@extends('layout')
@section('header')
Musicas
@endsection
@section('titulo-pagina')
Livros
@endsection
@section('conteudo')
<div class="row">
<div class="col-md-8">
</a>
</div>
</div>

@if(auth()->check())
<a href="" class="btn btn-secondary" role="button"><i class="fas fa-plus"></i></a>
@endif
@endsection