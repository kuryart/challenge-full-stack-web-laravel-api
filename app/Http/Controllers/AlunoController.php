<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AlunoService;
use App\Http\Requests\AlunoRequest;
use App\Http\Requests\AlunoRequestUpdate;

class AlunoController extends Controller
{
    private $alunoService;

    public function __construct(AlunoService $alunoService) {
        $this->alunoService = $alunoService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = $this->alunoService->all();

        return response($alunos, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AlunoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoRequest $request)
    {
        return $this->alunoService->save($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlunoRequestUpdate $request, $id)
    {
        return $this->alunoService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->alunoService->destroy($id);
    }
}
