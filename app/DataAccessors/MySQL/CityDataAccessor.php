<?php

namespace App\DataAccessors\MySQL;

use App\DataAccessors\CityDataAccessorInterface;
use App\Models\City;
use Illuminate\Support\Collection;

class CityDataAccessor implements CityDataAccessorInterface
{
    public function getAll(): Collection
    {
        return City::all();
    }
}
