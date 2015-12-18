<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BdArterisk extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create("perfil", function($tabla){
            $tabla->increments('id');
            $tabla->string('nombre', 100);
            $tabla->text('descripcion');
            $tabla->timestamps();
        });

        Schema::create("usuario", function($tabla){
            $tabla->increments('id');
            $tabla->string('usuario', 100);
            $tabla->string('nombres', 100);
            $tabla->string('apellidos', 100);
            $tabla->string('correo', 100);
            $tabla->string('contrasena', 100);
            $tabla->boolean('estado');
            $tabla->timestamps();
            $tabla->integer('perfil_id')->unsigned();
            $tabla->foreign('perfil_id')
                ->references('id')->on('perfil')
                ->onDelete('cascade');
        });

        Schema::create("pais", function($tabla){
            $tabla->increments('id');
            $tabla->string('nombre', 100);
            $tabla->text('descripcion');
            $tabla->timestamps();
        });

        Schema::create("departamento", function($tabla){
            $tabla->increments('id');
            $tabla->string('nombre', 100);
            $tabla->text('descripcion');
            $tabla->timestamps();
            $tabla->integer('pais_id')->unsigned();
            $tabla->foreign('pais_id')
                ->references('id')->on('pais')
                ->onDelete('cascade');
        });

        Schema::create("ciudad", function($tabla){
            $tabla->increments('id');
            $tabla->string('nombre', 100);
            $tabla->text('descripcion');
            $tabla->timestamps();
            $tabla->integer('departamento_id')->unsigned();
            $tabla->foreign('departamento_id')
                ->references('id')->on('departamento')
                ->onDelete('cascade');
        });

        Schema::create("cliente", function($tabla){
            $tabla->increments('id');
            $tabla->string('nit', 100);
            $tabla->string('nombre', 200);
            $tabla->text('direccion');
            $tabla->string('telefono', 100);
            $tabla->string('celular', 100);
            $tabla->string('correo', 100);
            $tabla->integer('dias_plazo_pago');
            $tabla->boolean('estado');
            $tabla->timestamps();
            $tabla->integer('ciudad_id')->unsigned();
            $tabla->foreign('ciudad_id')
                ->references('id')->on('ciudad')
                ->onDelete('cascade');
        });

        Schema::create("unidad_medida", function($tabla){
            $tabla->increments('id');
            $tabla->string('unidad_medida', 100);
            $tabla->text('descripcion');
            $tabla->timestamps();
        });

        Schema::create("marca", function($tabla){
            $tabla->increments('id');
            $tabla->string('marca', 100);
            $tabla->text('descripcion');
            $tabla->timestamps();
        });

        Schema::create("producto", function($tabla){
            $tabla->increments('id');
            $tabla->string('nombre', 200);
            $tabla->string('referencia', 200);
            $tabla->float('pvp');
            $tabla->timestamps();
            $tabla->integer('marca_id')->unsigned();
            $tabla->foreign('marca_id')
                ->references('id')->on('marca')
                ->onDelete('cascade');
            $tabla->integer('unidad_medida_id')->unsigned();
            $tabla->foreign('unidad_medida_id')
                ->references('id')->on('unidad_medida')
                ->onDelete('cascade');
        });

        Schema::create("factura", function($tabla){
            $tabla->increments('id');
            $tabla->dateTime('fecha_facturacion');
            $tabla->dateTime('fecha_vencimiento');
            $tabla->integer('cantidad');
            $tabla->float('valor_total');
            $tabla->timestamps();
            $tabla->integer('cliente_id')->unsigned();
            $tabla->foreign('cliente_id')
                ->references('id')->on('cliente')
                ->onDelete('cascade');
            $tabla->integer('usuario_id')->unsigned();
            $tabla->foreign('usuario_id')
                ->references('id')->on('usuario')
                ->onDelete('cascade');
        });

        Schema::create("factura_producto", function($tabla){
            $tabla->increments('id');
            $tabla->integer('factura_id')->unsigned();
            $tabla->foreign('factura_id')
                ->references('id')->on('factura')
                ->onDelete('cascade');
            $tabla->integer('producto_id')->unsigned();
            $tabla->foreign('producto_id')
                ->references('id')->on('producto')
                ->onDelete('cascade');
        });

        Schema::create("menu", function($tabla){
            $tabla->increments('id');
            $tabla->string('nombre', 100);
            $tabla->text('descripcion');
            $tabla->timestamps();
        });

        Schema::create("permiso", function($tabla){
            $tabla->increments('id');
            $tabla->text('ruta');
            $tabla->timestamps();
            $tabla->integer('perfil_id')->unsigned();
            $tabla->foreign('perfil_id')
                ->references('id')->on('perfil')
                ->onDelete('cascade');
        });

        Schema::create("item_menu", function($tabla){
            $tabla->increments('id');
            $tabla->integer('permiso_id')->unsigned();
            $tabla->foreign('permiso_id')
                ->references('id')->on('permiso')
                ->onDelete('cascade');
            $tabla->timestamps();
            $tabla->integer('menu_id')->unsigned();
            $tabla->foreign('menu_id')
                ->references('id')->on('menu')
                ->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop("item_menu");
        Schema::drop("permiso");
        Schema::drop("menu");
        Schema::drop("usuario");
        Schema::drop("ciudad");
        Schema::drop("cliente");
        Schema::drop("unidad_medida");
        Schema::drop("marca");
        Schema::drop("producto");
        Schema::drop("factura");
        Schema::drop("factura_producto");
        Schema::drop("departamento");
        Schema::drop("pais");
        Schema::drop("perfil");
	}

}
