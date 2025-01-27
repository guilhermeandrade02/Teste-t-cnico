<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

    protected $table = 'pacientes'; 

    protected $fillable = [
        'nome',
        'cpf',
        'celular'
    ];

    public function consultas()
    {
        return $this->hasMany(Consultas::class, 'paciente_id');
    }
}
