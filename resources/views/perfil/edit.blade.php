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
    }

    #leftcolumn {
      background: #ededed;
      width: 20%;
      float: left;
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
<form action="{{route('perfil.update',['nome'=>$user->name])}}" method="post" enctype="multipart/form-data">
@csrf
<div id="wrapper">
    <div id="leftcolumn" style="text-align:center">
    <h3>{{$user->name}}</h3>
    <div id="imgDiv" >
    </div>
    <br>
    <input type="file" name="img_perfil" value="{{$user->img_perfil}}">
    <br>
    <textarea style="resize: none; width:98%;" name="status" maxlength=1024 placeholder="Status...">{{$user->status}}</textarea>
    </div>
        <div id="content">
           <h6>Biografia</h6>
           <textarea style="resize: none; width:98%;" name="bio" maxlength=1024 placeholder="Fale um bocado de ti...">{{$user->bio}}</textarea>
           <h6>Musica</h6>
           <textarea style="resize: none; width:98%" name="musica" maxlength=255 placeholder="Aquela musica que tu adoras...">{{$user->musica}}</textarea>
           <h6>Texto</h6>
           <textarea style="resize: none; width:98%" name="texto" maxlength=255 placeholder="Aquele texto incrivel que amas...">{{$user->texto}}</textarea>
       </div>
      </div>
      <input type="submit" value="Guardar Alterações" class="btn btn-light" style="float:right">
</div>
@if($errors->has('bio'))
<div class="alert alert-danger">Bio Incorreta</div>
@endif
@if($errors->has('musica'))
<div class="alert alert-danger">Musica Incorreta</div>
@endif
@if($errors->has('texto'))
<div class="alert alert-danger">Texto Incorreta</div>
@endif
@if($errors->has('status'))
<div class="alert alert-danger">Status Incorreta</div>
@endif
@if($errors->has('img_perfil'))
<div class="alert alert-danger">Imagem Perfil Incorreta</div>
@endif
@endsection