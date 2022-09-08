<?php

namespace App\Services;

use App\Http\Requests\AlunoRequest;
use App\Http\Requests\AlunoRequestUpdate;
use App\Models\Aluno;
use App\Repository\Interface\AlunoRepositoryInterface;
use App\UnitOfWork\Facade\UnitOfWork;
use Illuminate\Http\Response;

class AlunoService
{
    protected $alunoRepository;

    public function __construct(AlunoRepositoryInterface $alunoRepository)
    {
        $this->alunoRepository = $alunoRepository;
    }

    /**

     * @return Collection
     */
    public function all()
    {
        return $this->alunoRepository->all();
    }

    public function save(AlunoRequest $request)
    {
        try {
            $aluno = new Aluno;
            $aluno->email = $request->email;
            $aluno->nome = $request->nome;
            $aluno->ra = $request->ra;
            $aluno->cpf = $request->cpf;

            $this->unityOfWork = UnitOfWork::instance()->begin();
            $result = $this->alunoRepository->save($aluno);
            $this->unityOfWork->commit();

            return response()->json($result, Response::HTTP_OK);
        } catch (\Exception $ex) {
            $this->unityOfWork->rollback();

            $exception = [
                'Message' => $ex->getMessage(),
                'Code' => $ex->getCode(),
                'Exception' => $ex->__toString()
            ];

            return response()->json($exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(AlunoRequestUpdate $request, $id)
    {
        try {
            $aluno = Aluno::find($id);

            if (is_null($aluno)) {
                return response()->json('Aluno não encontrado', Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $aluno->email = $request->email;
            $aluno->nome = $request->nome;
            $aluno->cpf = $request->cpf;

            $this->unityOfWork = UnitOfWork::instance()->begin();
            $result = $this->alunoRepository->save($aluno);
            $this->unityOfWork->commit();

            return response()->json($result, Response::HTTP_OK);
        } catch (\Exception $ex) {
            $this->unityOfWork->rollback();

            $exception = [
                'Message' => $ex->getMessage(),
                'Code' => $ex->getCode(),
                'Exception' => $ex->__toString()
            ];

            return response()->json($exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy($id)
    {
        try {
            $aluno = Aluno::find($id);

            if (is_null($aluno)) {
                return response()->json('Aluno não encontrado', Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $this->unityOfWork = UnitOfWork::instance()->begin();
            $result = $this->alunoRepository->destroy($aluno);
            $this->unityOfWork->commit();

            return response()->json($result, Response::HTTP_OK);
        } catch (\Exception $ex) {
            $this->unityOfWork->rollback();

            $exception = [
                'Message' => $ex->getMessage(),
                'Code' => $ex->getCode(),
                'Exception' => $ex->__toString()
            ];

            return response()->json($exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
