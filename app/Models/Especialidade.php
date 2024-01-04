<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_medico',
        'nome',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id', 'id');
    }

}
