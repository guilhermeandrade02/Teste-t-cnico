<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultas extends Model
{
    use HasFactory;

    protected $table = 'consultas'; 

    protected $fillable = [
        'medico_id',
        'paciente_id',
        'data',
    ];

    public function paciente()
    {
        return $this->belongsTo(Pacientes::class, 'paciente_id'); 
    }

    public function medico()
    {
        return $this->belongsTo(Medicos::class, 'medico_id'); 
    }


}
