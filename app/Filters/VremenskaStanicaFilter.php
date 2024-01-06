<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class VremenskaStanicaFilter extends ApiFilter
{
    protected $safeParms = [
        'naziv_stanice' => ['jednako', 'nejednako'],
    ];

    protected $columnMap = [
        'nazivStanice'=> 'naziv_stanice'
    ];

    protected $operatorMap = [
        'jednako' => '=',
        'nejednako' => '!=',
    ];
}
