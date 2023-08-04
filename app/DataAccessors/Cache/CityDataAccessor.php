<?php

namespace App\DataAccessors\Cache;

use App\DataAccessors\CityDataAccessorInterface;
use Illuminate\Support\Collection;

class CityDataAccessor implements CityDataAccessorInterface
{
    public function __construct(
        private CityDataAccessorInterface $dataAccessor
    ) {
    }

    public function getAll(): Collection
    {
        return $this->dataAccessor->getAll();
    }
}
