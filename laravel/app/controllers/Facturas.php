<?php

class Facturas extends \BaseController {

    protected $layout = 'layouts.master';
    protected $reglas = array(
        'nombre' => 'required',
        'descripcion' => 'required',
        'departamento_id' => 'required|integer',
    );
    public function home(){
        $this->layout->content = View::make('facturas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            $data['ciudades'] = Ciudad::with('Departamento')->orderBy('id', 'asc')->get();
            $data['departamentos'] = Departamento::orderBy('id', 'asc')->get();
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
        $Ciudad = new Ciudad;
        $Ciudad->nombre = Input::get('nombre');
        $Ciudad->descripcion = Input::get('descripcion');
        $Ciudad->departamento_id = Input::get('departamento_id');

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
            if($Ciudad->save()){
                $return['ok'] = true;
                $return['msg'] = 'La ciudad ha sido guardado';
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
        return Ciudad::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $Ciudad = Ciudad::find($id);

        $Ciudad->nombre = Input::get('nombre');
        $Ciudad->descripcion = Input::get('descripcion');
        $Ciudad->departamento_id = Input::get('departamento_id');
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
            if($Ciudad->save()){
                $return['ok'] = true;
                $return['msg'] = 'La producto ha sido guardado';
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
        $Ciudad = Ciudad::find($id);

        $Ciudad->delete();

        return Input::get('id');
    }


}
