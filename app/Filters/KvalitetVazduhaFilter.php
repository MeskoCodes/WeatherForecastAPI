<?php

namespace App\Filters;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class KvalitetVazduhaFilter extends ApiFilter {
    protected $safeParms=[
        'pm10'=>['manje','jednako','vise','nejednako'],
        'pm2_5'=>['manje','jednako','vise','nejednako'],
        'so2'=>['manje','jednako','vise','nejednako'],
        'co'=>['manje','jednako','vise','nejednako'],
        'o3'=>['manje','jednako','vise','nejednako'],
        'azot_dioksid'=>['manje','jednako','vise','nejednako'],
        'sumpordioksid'=>['manje','jednako','vise','nejednako'],
    ];
    protected $columnMap = [
        'PM10' => 'pm10',
        'PM25'=>'pm2_5',
        'SO2'=>'so2',
        'CO'=>'co',
        'O3'=>'o3',
        'azotDioksid'=>'azot_dioksid',
        'sumporDioksid'=>'sumpordioksid'



    ];

    protected $operatorMap = [
        'manje'=>'<',
        'manjeilijednako'=>'<=',
        'jednako' => '=',
        'vise'=>'>',
        'viseilijednako'=>'>=',
        'nejednako'=>'=/=',
    ];
}