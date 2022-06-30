<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isNull;

class Investimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'modalidade',
        'valor',
        'data_pagamento',
        'user_id',
        'cprf',
        'assinatura',
        'produto_id',
        'img',
        'status'
    ];


    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }


    public function getTipoFormattedAttribute()
    {
        if ($this->attributes['modalidade'] == 1) {
            return "Cupom";
        }else{
            return "Bullet";
        }
    }



    public function getStatusFormattedAttribute()
    {
        switch ($this->attributes['status']) {

            case 0;
                echo "Aguardando Pagamento";
                break;

            case 1;
                echo "Contrato Vigente";
                break;


            case 2;
                echo "Concluido";
                break;

        }
    }
}
