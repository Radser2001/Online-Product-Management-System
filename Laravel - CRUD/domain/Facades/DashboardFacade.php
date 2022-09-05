<?php

namespace domain\Facades;

use domain\Services\DashboardService;
use Illuminate\Support\Facades\Facade;

class DashboardFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return DashboardService::class;
    }
}
