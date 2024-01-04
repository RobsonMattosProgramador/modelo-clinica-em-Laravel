<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */

    public function todos_medicos()
    {
        $medicos = Medico::with('especialidades')->get();

        return view('medicos.cad_especialidade', [
            'medicos' => $medicos,
        ]);
    }


    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $especialidade = new Especialidade();
        $especialidade->medico_id = $request->id_medico;
        $especialidade->nome = $request->especialidade;
        $especialidade->save();


        return redirect()->route('cad.especialidade')->with('msg', 'Especialidade vinculada com sucesso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function show(Especialidade $especialidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialidade $especialidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especialidade $especialidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especialidade $especialidade)
    {
        //
    }
}
