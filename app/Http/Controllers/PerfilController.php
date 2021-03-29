<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Perfil;

class PerfilController extends Controller
{
    public function index(Request $r){
        $nome = $r->nome;
        $user = Perfil::where('name',$nome)->first();
        return view('perfil.index',['user'=>$user]);
    }

    public function edit(Request $r){
        $nome = $r->nome;
        $user = Perfil::where('name',$nome)->first();
        return view('perfil.edit',['user'=>$user]);
    }

    public function update(Request $r){
        $nome = $r->nome;
        $user = Perfil::where('name',$nome)->first();
        $editUser = $r->validate([
            'bio'=>['nullable','min:1','max:1024'],
            'musica'=>['nullable','min:1','max:1024'],
            'texto'=>['nullable','min:1','max:255'],
            'status'=>['nullable','min:1','max:255'],
            'img_perfil'=>['image','nullable','max:2000'],
        ]);
        $oldImage = $user->img_perfil;
        if($r->hasFile('img_perfil')){
            $nomeImg = $r->file('img_perfil')->getClientOriginalName();
            $nomeImg = time().'_'.$nomeImg;
            $saveImg = $r->file('img_perfil')->storeAs('img/', $nomeImg);
            if(!is_null($oldImage)){
                Storage::Delete('img/'.$oldImage);
            }
            $editUser['img_perfil']=$nomeImg;
        }
        $userAtualizado = $user->update($editUser);
        return redirect()->route('perfil.index',['nome'=>$user->name]);
    }
}
