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
    }
}
