<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [

        'cep',
        'endereco',
        'bairro_id',
        'cidade_id',
        'estado_id',
        'complemento',
        'n',
        'user_id',
    ];


    public function bairro()
    {
        return $this->belongsTo(Bairro::class);
    }
    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
