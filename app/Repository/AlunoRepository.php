<?php

namespace App\Repository\Eloquent;

use App\Models\Aluno;
use App\Repository\Interface\AlunoRepositoryInterface;
use App\Repository\BaseRepository;
use Illuminate\Support\Collection;

class AlunoRepository extends BaseRepository implements AlunoRepositoryInterface
{

   /**
    * AlunoRepository constructor.
    *
    * @param Aluno $model
    */
   public function __construct(Aluno $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();    
   }
}