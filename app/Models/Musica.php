<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;
    protected $primaryKey="id_musica";
    protected $table="musicas";

    public $timestamps = false;

    protected $fillable=[
        'id_user',
        'titulo',
        'link',
        'autor'
    ];
}
