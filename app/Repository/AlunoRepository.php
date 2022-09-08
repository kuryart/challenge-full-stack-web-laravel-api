<?php

namespace App\Repository;

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

    public function save(Aluno $aluno)
    {
        $aluno->save();
        return $aluno;
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return $aluno;
    }
}
