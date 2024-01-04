<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id',
       'nome',
       'email',
       'telefone'

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function especialidades()
    {
        return $this->hasMany(Especialidade::class, 'medico_id', 'id');
    }

}
