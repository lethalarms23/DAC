<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musica;
use Auth;

class MusicaController extends Controller
{
    public function index(){
        $musica = Musica::paginate(4);

        return view('musica.index',[
            'musicas'=>$musica
        ]);
    }

    public function create(){
        return view('musica.create');
    }

    public function show(Request $req){
        $idMusica = $req->id;
        $musica = Musica::where('id_musica',$idMusica)->first();
        return view('musica.show',['musica'=>$musica]);
    }

    public function store(Request $r){
        $novaMusica = $r->validate([
            'titulo'=>['required','min:1','max:255'],
            'id_user'=>['nullable','numeric','min:1'],
            'link'=>['nullable','min:1','max:255'],
            'autor'=>['nullable','min:1','max:255'],
        ]);
        $userAtual = Auth::user()->id;
        $novaMusica['id_user']=$userAtual;
        $musica = Musica::create($novaMusica);
        return redirect()->route('musica.index');
    }
}
