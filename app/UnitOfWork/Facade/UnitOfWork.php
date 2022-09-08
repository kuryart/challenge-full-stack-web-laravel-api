<?php

namespace App\UnitOfWork\Facade;

use App\UnitOfWork\UnitOfWork as UnitOfWorkService;

class UnitOfWork
{
    public static function instance()
    {
        return app()->make(UnitOfWorkService::class);
    }
}
