<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complementar extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado_civil',
        'profissao',
        'user_id'
    ];

    public function getEstadoCivilFormattedAttribute()
    {
        switch ($this->attributes['estado_civil']) {

            case 1;
                echo "SOLTEIRO";
                break;

            case 2;
                echo "CASADO";
                break;


            case 3;
                echo "DIVORCIADO";
                break;
            case 4;
                echo "VIUVO";
                break;
        }
    }
}
