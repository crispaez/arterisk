<?php

class Productos extends \BaseController {

    protected $layout = 'layouts.master';
    protected $reglas = array(
        'nit' => 'required',
        'nombre' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'celular' => 'required',
        'correo' => 'required|email|unique:usuario',
        'dias_plazo_pago' => 'required|integer',
        'estado' => 'required|integer',
        'ciudad_id' => 'required|integer',
    );
    public function home(){
        $this->layout->content = View::make('productos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            $data['clientes'] = Cliente::with('Ciudad')->orderBy('id', 'asc')->get();
            $data['ciudades'] = Ciudad::orderBy('id', 'asc')->get();
            $data['Departamentos'] = Departamento::orderBy('id', 'asc')->get();
            $data['paises'] = Pais::orderBy('id', 'asc')->get();
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

        $validar = Validator::make(
            Input::all(),
            $this->reglas
        );
        if ($validar->fails())
        {
            $return['ok'] = false;
            $return['msg'] = $validar->messages();
            return $return;
        }else{
            if($Cliente->save()){
                $return['ok'] = true;
                $return['msg'] = 'El cliente ha sido guardado';
                return $return;
            }else{
                $return['ok'] = false;
                $return['msg'] = 'No se pudo crear el registro';
                return $return;
            }
        }
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
        $validar = Validator::make(
            Input::all(),
            $this->reglas
        );
        if ($validar->fails())
        {
            $return['ok'] = false;
            $return['msg'] = $validar->messages();
            return $return;
        }else{
            if($Cliente->save()){
                $return['ok'] = true;
                $return['msg'] = 'El cliente ha sido guardado';
                return $return;
            }else{
                $return['ok'] = false;
                $return['msg'] = 'No se pudo crear el registro';
                return $return;
            }
        }
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

        return Input::get('id');
    }


}
