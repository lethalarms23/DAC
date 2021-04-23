<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Perfil;
use App\Models\Frames;

class PerfilController extends Controller
{
    public function index(Request $r){
        $nome = $r->nome;
        $user = Perfil::where('name',$nome)->first();
        $frame = Frames::where('id',$user->id_frame)->first();
        if(!is_null($frame)){
            $user['frame'] = $frame->img_frame;
        }
        return view('perfil.index',['user'=>$user]);
    }

    public function edit(Request $r){
        $nome = $r->nome;
        $user = Perfil::where('name',$nome)->first();
        $frame = Frames::where('id',$user->id_frame)->first();
        if(!is_null($frame)){
            $user['frame'] = $frame->img_frame;
        }
        $frames = Frames::all();
        return view('perfil.edit',['user'=>$user,'framesList'=>$frames]);
    }

    public function update(Request $r){
        $nome = $r->nome;
        $user = Perfil::where('name',$nome)->first();
        $editUser = $r->validate([
            'bio'=>['nullable','min:1','max:1024'],
            'musica'=>['nullable'],
            'texto'=>['nullable','min:1','max:255'],
            'status'=>['nullable','min:1','max:255'],
            'img_perfil'=>['image','nullable','max:2000'],
            'id_frame'=>['nullable','numeric'],
        ]);
        $oldMusica = $user->musica;
        if($r->hasFile('musica')){
            $nomeMusica = $r->file('musica')->getClientOriginalName();
            $nomeMusica = time().'_'.$nomeMusica;
            $saveMusica = $r->file('musica')->storeAs('musica/',$nomeMusica);
            if(!is_null($oldMusica)){
                Storage::Delete('musica/'.$oldMusica);
            }
            $editUser['musica']=$nomeMusica;
        }
        $oldImage = $user->img_perfil;
        if($r->hasFile('img_perfil')){
            $nomeImg = $r->file('img_perfil')->getClientOriginalName();
            $nomeImg = time().'_'.$nomeImg;
            $saveImg = $r->file('img_perfil')->storeAs('img/', $nomeImg);
            if(!is_null($oldImage) && $oldImage != "default.jpg"){
                Storage::Delete('img/'.$oldImage);
            }
            $editUser['img_perfil']=$nomeImg;
        }
        $userAtualizado = $user->update($editUser);
        return redirect()->route('perfil.index',['nome'=>$user->name]);
    }
}
