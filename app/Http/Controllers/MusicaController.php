<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musica;

class MusicaController extends Controller
{
    public function index(){
        $musica = Musica::paginate(4);

        return view('musica.index',[
            'musicas'=>$musica
        ]);
    }
}
