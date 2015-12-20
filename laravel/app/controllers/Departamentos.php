<?php

class Departamentos extends \BaseController {

    protected $layout = 'layouts.master';
    protected $reglas = array(
        'nombre' => 'required',
        'descripcion' => 'required',
        'pais_id' => 'required|integer',
    );
    public function home(){
        $this->layout->content = View::make('departamentos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            $data['departamentos'] = Departamento::with('pais')->orderBy('id', 'asc')->get();
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
        $Departamento = new Departamento;
        $Departamento->nombre = Input::get('nombre');
        $Departamento->descripcion = Input::get('descripcion');
        $Departamento->pais_id = Input::get('pais_id');

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
            if($Departamento->save()){
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
        return Departamento::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $Departamento = Departamento::find($id);

        $Departamento->nombre = Input::get('nombre');
        $Departamento->descripcion = Input::get('descripcion');
        $Departamento->pais_id = Input::get('pais_id');
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
            if($Departamento->save()){
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
        $Departamento = Departamento::find($id);

        $Departamento->delete();

        return Input::get('id');
    }


}
