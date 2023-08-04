<?php

namespace App\Services;

use App\DataAccessors\CityDataAccessorInterface;
use Illuminate\Support\Collection;

class CityService
{
    public function __construct(
        private readonly CityDataAccessorInterface $cityDataAccessor,
    ) {
    }

    public function getAll(): Collection
    {
        return $this->cityDataAccessor->getAll();
    }
}
