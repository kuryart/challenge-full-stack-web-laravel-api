<?php

namespace App\Repository\Interface;

use App\Models\Aluno;
use Illuminate\Support\Collection;

interface AlunoRepositoryInterface
{
   public function all(): Collection;
   public function save(Aluno $aluno);
   public function destroy(Aluno $aluno);
}
