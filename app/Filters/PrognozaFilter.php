<?php

namespace App\Filters;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class PrognozaFilter extends ApiFilter
{
    protected $safeParms = [
            'datum' => ['jednako','nejednako'],
            'temperatura' => ['manje','jednako','vise','nejednako'],
            'pritisak_vazduha' => ['manje','jednako','vise','nejednako'],
            'vlaznost_vazduha' => ['manje','jednako','vise','nejednako'],
            'brzina_vetra' => ['manje','jednako','vise','nejednako'],
            'smer_vetra'=> ['jednako','Sever', 'Severoistok', 'Istok', 'Jugoistok', 'Jug', 'Jugozapad', 'Zapad', 'Severozapad'],
    ];

    protected $columnMap = [
        'Datum' => 'datum',
        'Temperatura' =>'temperatura',
        'pritisakVazduha'=>'pritisak_vazduha',
        'vlaznostVazduha'=>'vlaznost_vazduha',
        'brzinaVetra'=> 'brzina_vetra',
        'smerVetra'=>'smer_vetra',

    ];

    protected $operatorMap = [
        'manje'=>'<',
        'manjeilijednako'=>'<=',
        'jednako' => '=',
        'nejednako'=>'=/=',
        'vise'=>'>',
        'viseilijednako'=>'>=',
        'Sever'=>'S',
        'Severoistok'=>'SI',
        'Istok'=>'I', 
        'Jugoistok'=>'JI',
        'Jug'=>'J',
        'Jugozapad'=>'JZ',
        'Zapad'=>'Z', 
        'Severozapad'=>'SZ'
    ];
}