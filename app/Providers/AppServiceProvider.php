<?php

namespace App\Providers;

use App\DataAccessors;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DataAccessors\CityDataAccessorInterface::class, function () {
            return new DataAccessors\Cache\CityDataAccessor(
                new DataAccessors\MySQL\CityDataAccessor()
            );
        });

        $this->app->bind(DataAccessors\DoctorDataAccessorInterface::class, function () {
            return new DataAccessors\Cache\DoctorDataAccessor(
                new DataAccessors\MySQL\DoctorDataAccessor()
            );
        });

        $this->app->bind(DataAccessors\PatientDataAccessorInterface::class, function () {
            return new DataAccessors\Cache\PatientDataAccessor(
                new DataAccessors\MySQL\PatientDataAccessor()
            );
        });

        $this->app->bind(DataAccessors\DoctorPatientDataAccessorInterface::class, function () {
            return new DataAccessors\Cache\DoctorPatientDataAccessor(
                new DataAccessors\MySQL\DoctorPatientDataAccessor()
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
