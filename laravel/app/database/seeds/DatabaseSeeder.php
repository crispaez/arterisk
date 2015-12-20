<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('PoblarPerfilesSeeder');
	}

}

//calse para poblar perfiles
class PoblarPerfilesSeeder extends Seeder {
    public function run()
    {
        DB::table('perfil')->insert(array(
            'nombre' => 'Administrador',
            'descripcion' => 'Administrador'
        ));

        DB::table('perfil')->insert(array(
            'nombre' => 'Usuario',
            'descripcion' => 'Usuario'
        ));

        DB::table('perfil')->insert(array(
            'nombre' => 'Cliente',
            'descripcion' => 'Cliente'
        ));

        DB::table('pais')->insert(array(
            'nombre' => 'Colombia',
            'descripcion' => 'Colombia'
        ));

        DB::table('departamento')->insert(array(
            'nombre' => 'D.C.',
            'descripcion' => 'Distrito Capital',
            'pais_id' => 1,
        ));

        DB::table('ciudad')->insert(array(
            'nombre' => 'Bogotá.',
            'descripcion' => 'Bogotá',
            'departamento_id' => 1,
        ));

        DB::table('menu')->insert(array(
            'nombre' => 'principal',
            'descripcion' => 'Menu principal',
        ));

        DB::table('menu')->insert(array(
            'nombre' => 'menu_derecho',
            'descripcion' => 'Menu derecho',
        ));

        User::create([
            'usuario' => 'admin',
            'nombres' => 'Sistema',
            'apellidos' => 'Administrador',
            'correo' => 'admin@admin.com',
            'contrasena' =>  Hash::make('secret'),
            'estado' => 1,
            'perfil_id' => 1,
        ]);
    }
}
