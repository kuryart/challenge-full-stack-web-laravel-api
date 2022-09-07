<?php

namespace App\Services;

use App\Repository\Interface\AlunoRepositoryInterface;

class AlunoService
{
  protected $alunoRepository;

  public function __construct(AlunoRepositoryInterface $alunoRepository) {
    $this->alunoRepository = $alunoRepository;
  }

    /**
    
    * @return Collection
    */  
  public function all()
  {
    return $this->alunoRepository->all();
  }
}
