<?php

class Clientes extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            $data['clientes'] = Cliente::orderBy('id', 'asc')->get();
            $data['ciudades'] = Ciudad::orderBy('id', 'asc')->get();
            return $data;
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store() {
        $Cliente = new Cliente;
        $Cliente->nit = Input::get('nit');
        $Cliente->nombre = Input::get('nombre');
        $Cliente->direccion = Input::get('direccion');
        $Cliente->telefono = Input::get('telefono');
        $Cliente->celular = Input::get('celular');
        $Cliente->correo = Input::get('correo');
        $Cliente->dias_plazo_pago = Input::get('dias_plazo_pago');
        $Cliente->estado = Input::get('estado');
        $Cliente->ciudad_id = Input::get('ciudad_id');
        $Cliente->save();

        return 'Cliente record successfully created with id ' . $Cliente->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Cliente::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $Cliente = Cliente::find($id);

        $Cliente->nit = Input::get('nit');
        $Cliente->nombre = Input::get('nombre');
        $Cliente->direccion = Input::get('direccion');
        $Cliente->telefono = Input::get('telefono');
        $Cliente->celular = Input::get('celular');
        $Cliente->correo = Input::get('correo');
        $Cliente->dias_plazo_pago = Input::get('dias_plazo_pago');
        $Cliente->estado = Input::get('estado');
        $Cliente->ciudad_id = Input::get('ciudad_id');
        $Cliente->save();

        return "Sucess updating user #" . $Cliente->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $Cliente = Cliente::find($id);

        $Cliente->delete();

        return "Cliente record successfully deleted #" . Input::get('id');
    }


}
