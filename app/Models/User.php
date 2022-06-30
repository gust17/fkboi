<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rg',
        'cpf',
        'telefone',
        'link',
        'quem',
        'nascimento',
        'expedidor',
        'tipo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNascimentoFormatedAttribute()
    {
        return Carbon::parse($this->attributes['nascimento'])->format('d/m/Y');
    }

    public function contas()
    {
        return $this->hasMany(Conta::class);
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    public function investimentos()
    {
        return $this->hasMany(Investimento::class);
    }

    public function complementar()
    {
        return $this->hasOne(Complementar::class);
    }

    public function indicacaos()
    {
        return $this->hasMany(User::class, 'quem', 'link');
    }

    public function getAtivoInvestimento()
    {
        if (count($this->investimentos->where('status', 1)) > 0) {
            return 1;
        }
    }


    public function getTotalInvestido()
    {
        return $this->investimentos->where('status',1)->sum('valor');
    }
    public function getTotalAberto()
    {
        return $this->investimentos->where('status',0)->sum('valor');
    }


}
