<?php

class Productos extends \BaseController {

    protected $layout = 'layouts.master';
    protected $reglas = array(
        'nombre' => 'required',
        'referencia' => 'required',
        'pvp' => 'required|numeric',
        'marca_id' => 'required|integer',
        'unidad_medida_id' => 'required|integer',
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
            $data['productos'] = Producto::with('Marca')->with('unidadMedida')->orderBy('id', 'asc')->get();
            $data['marcas'] = Marca::orderBy('id', 'asc')->get();
            $data['unidadesMedidas'] = UnidadMedida::orderBy('id', 'asc')->get();
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
        $Producto = new Producto;
        $Producto->nombre = Input::get('nombre');
        $Producto->referencia = Input::get('referencia');
        $Producto->pvp = Input::get('pvp');
        $Producto->marca_id = Input::get('marca_id');
        $Producto->unidad_medida_id = Input::get('unidad_medida_id');

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
            if($Producto->save()){
                $return['ok'] = true;
                $return['msg'] = 'El producto ha sido guardado';
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
        return Producto::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $Producto = Producto::find($id);

        $Producto->nombre = Input::get('nombre');
        $Producto->referencia = Input::get('referencia');
        $Producto->pvp = Input::get('pvp');
        $Producto->marca_id = Input::get('marca_id');
        $Producto->unidad_medida_id = Input::get('unidad_medida_id');
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
            if($Producto->save()){
                $return['ok'] = true;
                $return['msg'] = 'El producto ha sido guardado';
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
        $Producto = Producto::find($id);

        $Producto->delete();

        return Input::get('id');
    }


}
