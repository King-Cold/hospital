<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $medicamentos = Medicamento::all();

    return view('medicamentos.index', compact('medicamentos'));
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
   public function store(Request $request)
{
    $request->validate([
        'clave' => 'required|unique:medicamentos,clave',
        'nombre' => 'required',
        'unidad_medida' => 'required',
        'precio_unitario' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
    ]);

    Medicamento::create($request->all());

    return redirect()->route('medicamentos.index')
        ->with('success','Medicamento registrado correctamente');
}

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamento $medicamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamento $medicamento)
    {
        //
    }
}
