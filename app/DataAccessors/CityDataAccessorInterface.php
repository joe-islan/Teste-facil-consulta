<?php

namespace App\DataAccessors;

use Illuminate\Support\Collection;

interface CityDataAccessorInterface extends DataAccessorInterface
{
    public function getAll(): Collection;
}
