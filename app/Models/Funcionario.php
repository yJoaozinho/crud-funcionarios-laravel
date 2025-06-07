<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $primaryKey = 'cpf';
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable = [
        'cpf',
        'nome',
        'data_nascimento',
        'telefone',
        'genero',
    ];
}
