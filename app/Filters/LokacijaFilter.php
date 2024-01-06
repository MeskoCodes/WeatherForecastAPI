<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class LokacijaFilter extends ApiFilter{
    protected $safeParms=[
        'grad'=>['jednako','nejednako'],
        'drzava'=>['jednako','nejednako']
    ];
    protected $columnMap = [
        'Grad' => 'grad',
        'Drzava'=>'drzava',

    ];

    protected $operatorMap = [

        'jednako' => '=',
        'nejednako'=>'=/=',
    ];
};