<?php

namespace App\Filters;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class ObavijestiFilter extends ApiFilter{
    protected $safeParms=[
        'tip_obavijesti'=>['jednako','nejednako'],
        'sadrzaj'=>['jednako','nejednako']
    ];
    protected $columnMap = [
        'tipObavijesti' => 'tip_obavijesti',
        'Sadrzaj'=>'sadrzaj',

    ];

    protected $operatorMap = [

        'jednako' => '=',
        'nejednako'=>'=/=',
    ];
};