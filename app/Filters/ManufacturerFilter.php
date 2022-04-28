<?php

namespace App\Filters;

use App\Models\CarModel;
use App\Models\Manufacturer;

class ManufacturerFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('manufacturer_id', $value);
    }
}
