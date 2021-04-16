<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frames extends Model
{
    use HasFactory;

    protected $primaryKey="id";
    protected $table="frames";

    public $timestamps = false;

    protected $fillable=[
        'id',
        'img_frame',
        'nome',
    ];
}
