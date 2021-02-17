@extends('layout')
@section('header')
Adicionar Musica
@endsection
@section('conteudo')
<form action="{{route('musica.store')}}" method="post" enctype="multipart/form-data">
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Título</th>
<td><input type="text" name="titulo" value="{{old('titulo')}}">*</td>
</tr>
<tr>
<th>Autor</th>
<td><input type="text" name="autor" value="{{old('autor')}}"></td>
</tr>
<tr>
<th>Link</th>
<td><input type="text" name="link" value="{{old('link')}}"></td>
</tr>
<tr>
<td>Enviar Dados</td>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@if($errors->has('titulo'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Titulo Incorreto</td>
</tr>
</table>
@endif
@endsection