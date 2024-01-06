<?php

namespace App\Filters;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class VremenskiUsloviFilter extends ApiFilter
{
    protected $safeParms = [
        'opis' => ['jednako','nejednako'],
    ];

    protected $columnMap = [
        'Opis' => 'opis',
    ];

    protected $operatorMap = [
        'jednako' => '=',
        'nejednako'=>'=/=',
    ];
}
