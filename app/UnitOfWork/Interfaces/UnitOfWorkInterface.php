<?php

namespace App\UnitOfWork\Interfaces;

interface UnitOfWorkInterface
{
    public function begin();
    public function commit();
    public function rollback();
}
