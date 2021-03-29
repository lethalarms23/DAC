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
      height:85%;
      border-radius: 3%;
    }

    #leftcolumn {
      background: #ededed;
      width: 20%;
      float: left;
      height:85%;
      border-radius: 3%;
    }

    #imgDiv {
      width: 100px;
      height: 100px;
      background-image: url("{{asset('img/'.$user->img_perfil)}}");
      border-radius: 30%;
      margin:0px auto;
      background-size: cover;
    }
</style>
@section('conteudo')
<div id="wrapper">
    <div id="leftcolumn" style="text-align:center">
    <h3>{{$user->name}}</h3>
    <div id="imgDiv" >
    </div>
    {{$user->status}}<br>
    @if(Auth::check())
    @if(Auth::user()->name == $user->name)
    <a class="btn btn-link" href="{{route('perfil.edit',['nome'=>Auth::user()->name])}}">Editar Perfil</a>
    @endif 
    @endif
    </div>
        <div id="content">
           <br>
           <h6>Biografia</h6>
           <p>{{$user->bio}}</p>
           <h6>Musica</h6>
           <p>{{$user->musica}}</p>
           <h6>Texto</h6>
           <p>{{$user->texto}}</p>
       </div>
      </div>
</div>
@endsection