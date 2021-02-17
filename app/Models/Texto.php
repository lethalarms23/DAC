<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    use HasFactory;

    protected $primaryKey="id_musica";
    protected $table="musicas";

    protected $fillable=[
        'id_user',
        'texto',
        'autor',
    ];
}
