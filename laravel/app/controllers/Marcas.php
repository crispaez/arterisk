<?php

class Marcas extends \BaseController {

    protected $layout = 'layouts.master';
    protected $reglas = array(
        'marca' => 'required',
        'descripcion' => 'required',
    );
    public function home(){
        $this->layout->content = View::make('marcas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            $data['marcas'] = Marca::orderBy('id', 'asc')->get();
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
        $Marca = new Marca;
        $Marca->marca = Input::get('marca');
        $Marca->descripcion = Input::get('descripcion');

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
            if($Marca->save()){
                $return['ok'] = true;
                $return['msg'] = 'La marca ha sido guardado';
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
        return Marca::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $Marca = Marca::find($id);

        $Marca->marca = Input::get('marca');
        $Marca->descripcion = Input::get('descripcion');
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
            if($Marca->save()){
                $return['ok'] = true;
                $return['msg'] = 'La marca ha sido guardado';
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
        $Marca = Marca::find($id);

        $Marca->delete();

        return Input::get('id');
    }


}
