<?php

namespace App\Filters;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class PadavineFilter extends ApiFilter{
    protected $safeParms=[
        'datum'=>['jednako','nejednako'],
        'kolicina_padavina'=>['manje','jednako','vise','nejednako']
    ];
    protected $columnMap = [
        'Datum' => 'datum',
        'kolicinaPadavina'=>'kolicina_padavina',

    ];

    protected $operatorMap = [
        'manje'=>'<',
        'manjeilijednako'=>'<=',
        'jednako' => '=',
        'vise'=>'>',
        'viseilijednako'=>'>=',
        'nejednako'=>'=/=',
    ];
};