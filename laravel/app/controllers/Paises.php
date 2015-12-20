<?php

class Paises extends \BaseController {

    protected $layout = 'layouts.master';
    protected $reglas = array(
        'nombre' => 'required',
        'descripcion' => 'required',
    );
    public function home(){
        $this->layout->content = View::make('paises');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
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
        $Pais = new Pais;
        $Pais->nombre = Input::get('nombre');
        $Pais->descripcion = Input::get('descripcion');

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
            if($Pais->save()){
                $return['ok'] = true;
                $return['msg'] = 'El pais ha sido guardado';
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
        return Pais::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $Pais = Pais::find($id);

        $Pais->nombre = Input::get('nombre');
        $Pais->descripcion = Input::get('descripcion');
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
            if($Pais->save()){
                $return['ok'] = true;
                $return['msg'] = 'El pais ha sido guardado';
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
        $Pais = Pais::find($id);

        $Pais->delete();

        return Input::get('id');
    }


}
