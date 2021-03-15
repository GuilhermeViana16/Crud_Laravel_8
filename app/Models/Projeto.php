<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $table = 'projetos';
    public $timestamps = true;

    protected $casts = [
        'custo' => 'float'
    ];

    protected $fillable = [
        'nome',
        'introducao',
        'created_at',
        'localizacao',
        'custo'
    ];
}