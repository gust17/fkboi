<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'meses',
        'taxa_mes',
        'ordem',
        'img',
        'descricao',
        'taxa_mes',
        'taxa_ano',
        'taxa_mes',
        'taxa_ano',
        'ativo'

    ];
}
