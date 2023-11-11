<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTarefaRequest;
use App\Http\Requests\UpdateTarefaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cadastrar(Request $request)
    {
        $tarefa = New Tarefa();
        $tarefa->nome = $request->input('nomeTarefa');
        $tarefa->descricao = $request->input('descricaoTarefa');
        $tarefa->prazo = $request->input('prazoTarefa');
        $tarefa->nivel = $request->input('nivelTarefa');
        $tarefa->cat_profissional = $request->input('catProfissional');
        $tarefa->cat_academico = $request->input('catAcademico');
        $tarefa->cat_pessoal = $request->input('catPessoal');
        $tarefa->cat_viagens = $request->input('catViagens');
        $tarefa->user_id = Auth::id(); 
        $tarefa->save();

        return redirect()->route('inicio.tarefa');
    }

    public function index()
    {
        // Verifique se o usuário está autenticado
        if (Auth::check()) {
            // Acesse o ID do usuário
            $userId = Auth::user()->id;

            //consultas das tarefas divididas po UI
            $tarefaUi = Tarefa::where('user_id', '=', $userId)
            ->where('nivel', 1)
            ->get();
            
            $tarefaNui = Tarefa::where('user_id', '=', $userId)
            ->where('nivel', 2)
            ->get();

            $tarefaUni = Tarefa::where('user_id', '=', $userId)
            ->where('nivel', 3)
            ->get();

            $tarefaNuni = Tarefa::where('user_id', '=', $userId)
            ->where('nivel', 4)
            ->get();

            // dd($tarefaNui);

            return view('inicio',['tarefaUi' => $tarefaUi, 'tarefaNui' => $tarefaNui, 'tarefaUni'=> $tarefaUni, 'tarefaNuni' => $tarefaNuni]);
        } else {
            // O usuário não está autenticado, execute o tratamento apropriado
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTarefaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTarefaRequest $request, Tarefa $tarefa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
