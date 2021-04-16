@extends('layout')
<style>
    p {
      padding: 10px;
    }

    #wrapper {
      margin: 0 auto;
      width: 100%;
    }

    #content {
      float: left;
      background: #FFFFFF;
      width: 80%;
      height:45%;
      border-radius: 3%;
    }

    #leftcolumn {
      background: #ededed;
      width: 20%;
      float: left;
      height:40%;
      border-radius: 3%;
    }

    #imgDiv {
      width: 140px;
      height: 140px;
      background-image: url("{{asset('img/'.$user->img_perfil)}}");
      border-radius: 10%;
      margin:0px auto;
      position:relative;
      background-size: cover;
    }

    #frame{
      position: absolute;
      width: 170px;
      height: 170px;
      left: -15px;
      top: -15px;
    }

    #type-badge{
      border-radius: 7%;
      width: 90px;
      margin:0px auto;
      background-color: #c4b3e0;
      background-size: cover;
    }
</style>
@section('conteudo')
<form action="{{route('perfil.update',['nome'=>$user->name])}}" method="post" enctype="multipart/form-data">
@csrf
<div class="container" style="max-width: 100%">
    <div class="row">
    <div class="col-md-auto">
      <h3>{{$user->name}}</h3>
      <div id="type-badge">
      {{$user->tipo_user}}<br>
      </div>
      <br>
      <div id="imgDiv">
      @if(!is_null($user->frame))
      <img src="{{asset('img/'.$user->frame)}}" id="frame">
      @endif
      </div>
      <br>
      {{$user->status}}<br>
      @if(Auth::check())
      @if(Auth::user()->name == $user->name || Auth::user()->tipo_user == "admin")
      <a class="btn btn-link" href="{{route('perfil.edit',['nome'=>$user->name])}}">Editar Perfil</a>
      @endif 
      @endif
    <br>
    </div>
        <div class="col">
          <h6>Biografia</h6>
          <p>{{$user->bio}}</p>
          <h6>Musica</h6>
          <p>{{$user->musica}}</p>
          <h6>Texto</h6>
          <p>{{$user->texto}}</p>
        </div> 
    </div>
</div>
</form>
@endsection