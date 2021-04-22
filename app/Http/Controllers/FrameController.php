<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Frames;

class FrameController extends Controller
{
    public function create(){
        return view('frame.create');
    }

    public function store(Request $r){
        $novoFrame = $r->validate([
            'img_frame'=>['image','required','max:6000'],
            'nome'=>['nullable','min:1','max:255'],
        ]);
        if($r->hasFile('img_frame')){
            $nomeImagem = $r->file('img_frame')->getClientOriginalName();
            $nomeImagem = time().'_'.$nomeImagem;
            $guardarImagem = $r->file('img_frame')->storeAs('img',$nomeImagem);

            $novoFrame['img_frame']=$nomeImagem;
        }
        $frame = Frames::create($novoFrame);
        return redirect()->route('index');
    }
}
