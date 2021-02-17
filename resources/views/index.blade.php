@extends('layout')
@section('header')
Página Inicial
@endsection
@section('conteudo')
<table class="table table-dark table-striped">
<thead>
    <tr>
      <th scope="col">ID User</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">ID Texto</th>
    </tr>
  </thead>
  <tbody>
  <tr>
  @foreach($users as $user)
    <tr>
    <td>{{$user->id}} </td>
    <td>{{$user->name}} </td>
    <td>{{$user->email}} </td>
    <td>{{$user->id_texto}}</td>
    </tr>
  @endforeach
    </tr>
  </tbody>
</table>
@endsection