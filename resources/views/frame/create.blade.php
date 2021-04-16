@extends('layout')
@section('header')
Adicionar Livro
@endsection
@section('conteudo')
<form action="{{route('frame.store')}}" method="post" enctype="multipart/form-data">
@csrf
<table class="table table-light">
<tr>
<th>Imagem</th>
<td><input type="file" name="img_frame" value="{{old('img_frame')}}"></td>
</tr>
<tr>
<th>Nome</th>
<td><input type="text" name="nome" value="{{old('nome')}}"></td>
</tr>
<tr>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@if($errors->has('img_frame'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Image mal</td>
</tr>
</table>
@endif
@endsection