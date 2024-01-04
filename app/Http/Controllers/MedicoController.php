<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MedicoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:level')->only('index');
    }

    public function meus_medicos(User $id)
    {
        $user = User::where('id',$id->id)->first();
        $medicos = $user->customers()->get();

        return view('medicos.meus_medicos', [
            'medicos' => $medicos
        ]);
    }

    public function todos_medicos()
    {
        $medicos = Medico::with('especialidades')->paginate(5);

        return view('medicos.todos_medicos', [
            'medicos' => $medicos,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('medicos.index',[
      'medicos' => Medico::orderBy('nome')->paginate('5')
     ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medico = new Medico();
        $medico->user_id = $request->user_id;
        $medico->nome = $request->nome;
        $medico->email = $request->email;
        $medico->telefone = $request->telefone;
        $medico->save();

        return redirect()->route('medico.create')->with('msg', 'Médico cadastrado com sucesso!!!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico)
    {
        return view('medicos.show', ['medico' => $medico]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {
        return view('medicos.edit', ['medico' => $medico]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        Medico::findOrFail($medico->id)->update($request->all());
        return redirect()->route('medico.show', $medico->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Medico $medico)
    {
        Medico::findOrFail($medico->id)->delete();
        return redirect()->route('meus.medicos', Auth::user()->id);
    }

    public function confirma_delete(Medico $id)
    {
        return view('medicos.confirma_delete', ['id' =>$id]);
    }
}
