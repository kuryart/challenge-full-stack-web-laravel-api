<?php

namespace App\Repository\Interface;

use Illuminate\Support\Collection;

interface AlunoRepositoryInterface
{
   public function all(): Collection;
}