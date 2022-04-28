<?php

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class AdFilter extends AbstractFilter
{
    protected $filters = [
        'manufacturer' => ManufacturerFilter::class
    ];
}
