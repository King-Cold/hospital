<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $pacientes = Paciente::all();
    return view('pacientes.index', [
        'pacientes' => $pacientes,
        'titulo' => 'Módulo de Pacientes'
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('pacientes.create', [
        'titulo' => 'Registrar Paciente'
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'nss' => 'required|string|max:50|unique:pacientes,nss',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
    ], [
        'nombre.required' => 'El nombre es obligatorio',
        'nss.required' => 'El NSS es obligatorio',
        'nss.unique' => 'El NSS ya está registrado',
        'fecha_inicio.required' => 'La fecha de vigencia inicio es obligatoria',
        'fecha_fin.required' => 'La fecha de vigencia fin es obligatoria',
        'fecha_fin.after_or_equal' => 'La fecha fin debe ser mayor o igual a la fecha inicio'
    ]);

    Paciente::create($request->all());

    return redirect()->route('pacientes.index')
        ->with('success', 'Paciente registrado correctamente');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
         return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Paciente $paciente)
{
   $request->validate([
    'nombre' => 'required',
    'nss' => 'required',
    'afiliacion' => 'nullable',
    'consultorio' => 'nullable',
    'turno' => 'nullable',
    'diagnostico' => 'required',
    'fecha_inicio' => 'required|date',
    'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
]);

    $paciente->update($request->all());

    return redirect()
            ->route('pacientes.index')
            ->with('success', 'Paciente actualizado correctamente');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
{
    $paciente->delete();

    return redirect()
           ->route('pacientes.index')
           ->with('success', 'Paciente eliminado correctamente');
           
}


}
