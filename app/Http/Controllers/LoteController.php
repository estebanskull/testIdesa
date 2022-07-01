<?php

namespace App\Http\Controllers;

use App\Lote;
use Illuminate\Http\Request;
use Validator;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function boot()
    {
        $rules = array(
            'nombre' => 'required|string',
            'ocupado' => 'sometimes|boolean'
        );
        $messages = array(
            'required' => 'El campo es obligatorio',
            'string'   => 'El campo debe ser de tipo cadena',
            'boolean'  => 'El campo debe ser de tipo boleano'
        );
    }

    public function index()
    {
        return Lote::orderBy('id')->get();
    }

    public function validar(Request $request)
    {
        $rules = array(
            'nombre' => 'required|string',
            'ocupado' => 'sometimes|boolean'
        );
        $messages = array(
            'required' => 'El campo es obligatorio',
            'string'   => 'El campo debe ser de tipo cadena',
            'boolean'  => 'El campo debe ser de tipo boleano'
        );
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return $validator->errors();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validar($request);
        Lote::create($request->all());
        $message = "Lote ".Lote::orderBy('id', 'desc')->first()->id." registrado";
        return response(array(
            'message' => $message
        ), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function show(Lote $lote)
    {
        return Lote::findOrFail($lote->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lote $lote)
    {
        $this->validar($request);
        Lote::findOrFail($lote->id)->update($request->all());
        return "Registro actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lote $lote)
    {
        Lote::destroy($lote->id);
        return "Registro eliminado";
    }
}
