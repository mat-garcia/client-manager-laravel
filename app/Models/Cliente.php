<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'user_id',
        'nome',
        'email',
        'telefone',
        'cep',
        'rua',
        'bairro',
        'cidade',
        'estado',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
