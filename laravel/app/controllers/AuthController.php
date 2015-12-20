<?php

class AuthController extends BaseController {
    protected $layout = 'layouts.master';
    protected $reglas = array(
        'nombres' => 'required',
        'apellidos' => 'required',
        'correo' => 'required|email',
        //'password' => 'required',
        //'estado_id' => 'required|integer',
        'perfil_id' => 'required|integer',
    );
    public function index()
    {
        $this->layout->content = View::make('hello');
    }

    public function showLogin()
    {
        if (Auth::check())
        {
            return Redirect::to('/');
        }
        return View::make('login');
    }

    public function postLogin()
    {
        $data = [
            'username' => Input::get('correo'),
            'password' => Input::get('contrasena'),
        ];

        if (Auth::attempt($data, Input::get('remember')))
        {
            return Redirect::intended('/');
        }
        return Redirect::back()->with('error_message', 'Correo o Contraseña incorrectos')->withInput();
    }

    public function logOut()
    {
        Auth::logout();
        return Redirect::to('login')->with('error_message', 'La sesión secerro correctamente.');
    }
    public function home(){
        $this->layout->content = View::make('usuarios');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexUsuarios($id = null) {
        if ($id == null) {
            $data['usuarios'] = User::with('Perfil')->orderBy('id', 'asc')->get();
            $data['perfiles'] = Perfil::orderBy('id', 'asc')->get();
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
        $Usuario = new User;
        $Usuario->nombres = Input::get('nombres');
        $Usuario->apellidos = Input::get('apellidos');
        $Usuario->correo = Input::get('correo');
        $Usuario->password = Hash::make(Input::get('password'));
        $Usuario->estado = 1;
        $Usuario->perfil_id = Input::get('perfil_id');

        $this->reglas['username'] = 'required|unique:usuario';
        $this->reglas['password'] = 'required';

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
            if($Usuario->save()){
                $return['ok'] = true;
                $return['msg'] = 'El usuario ha sido guardado';
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
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $Usuario = User::find($id);

        $Usuario->nombres = Input::get('nombres');
        $Usuario->apellidos = Input::get('apellidos');
        $Usuario->correo = Input::get('correo');
        $Usuario->estado = 1;
        $Usuario->perfil_id = Input::get('perfil_id');

        if(isset($_POST['password']) && !empty($_POST['password']))
        {
            $Usuario->password = Hash::make(Input::get('password'));
        }

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
            if($Usuario->save()){
                $return['ok'] = true;
                $return['msg'] = 'El usuario ha sido guardado';
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
        $Usuario = User::find($id);

        $Usuario->delete();

        return Input::get('id');
    }


}
