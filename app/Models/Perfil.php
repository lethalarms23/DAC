<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $primaryKey="id";
    protected $table="users";

    public $timestamps = true;

    protected $fillable=[
        'id',
        'name',
        'musica',
        'texto',
        'bio',
        'status',
        'img_perfil'
    ];
}
