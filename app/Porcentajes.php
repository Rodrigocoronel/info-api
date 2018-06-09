<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Passport\HasApiTokens;

class Porcentajes extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'distrito',
        'municipio',
        'seccion',
        'habitantes_seccion',
        'p_pan',
        'p_pri',
        'p_morena',
        'p_otros',
        'c_pan',
        'c_pri',
        'c_morena',
        'c_otros',
        'seguridad',
        'servicios_publicos',
        'empleo',
        'infraestructura_urbana',
        'agua',
        'gasolina',
        'basura',
        'varios',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


}