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
    <div id="type-badge" style="text-align:center">
    {{$user->tipo_user}}<br>
    </div>
    <br>
    <div id="imgDiv">
    <img src="{{asset('img/'.$user->frame)}}" id="frame">
    </div>
    <br>
    </div>
        <div class="col">
           <h6>Imagem de Perfil</h6>
           <input type="file" name="img_perfil" value="{{$user->img_perfil}}">
           <h6>Status</h6>
           <textarea style="resize: none; width:98%; height: 10%" name="status" maxlength=1024 placeholder="Status...">{{$user->status}}</textarea>
           <h6>Biografia</h6>
           <textarea style="resize: none; width:98%;" name="bio" maxlength=1024 placeholder="Fale um bocado de ti...">{{$user->bio}}</textarea>
           <h6>Musica</h6>
           <input type="file" name="musica">
           <h6>Texto</h6>
           <textarea style="resize: none; width:98%" name="texto" maxlength=255 placeholder="Aquele texto incrivel que amas...">{{$user->texto}}</textarea>
           <input type="submit" value="Enviar" class="btn btn-light" style="float:right;">
        </div> 
    </div>
        <h5 style="text-align:justify">Moldura do Perfil</h5>
        <div class="row">
        @foreach($framesList as $frames)
        <div class="col">
            <br>
            @if($frames->id == $user->id_frame)
            <input type="radio" name="id_frame" value="{{$frames->id}}" checked>
            <img  src="{{asset('img/'.$frames->img_frame)}}">
            </input>
            <h5 style="text-align:center">{{$frames->nome}}</h5>
            @else
            <input type="radio" name="id_frame" value="{{$frames->id}}">
            <img name="id_frame" value="{{$frames->id}}" src="{{asset('img/'.$frames->img_frame)}}">
            </input>
            <br>
            <h5 style="text-align:justify">{{$frames->nome}}</h5>
            @endif
            </div>
          @endforeach
       </div>
</div>

</form>
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
@if($errors->has('id_frame'))
<div class="alert alert-danger">Id Frame Incorreta</div>
@endif
@endsection