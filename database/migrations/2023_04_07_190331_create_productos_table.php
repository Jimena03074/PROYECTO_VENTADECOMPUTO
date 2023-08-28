<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('idp');
            $table->string('nombre',60);
            $table->integer('cantidad');
            $table->double('costo');
  
            $table->integer('idc')->unsigned();
            $table->foreign('idc')->references('idc')->on('categorias');
          
            $table->integer('idt')->unsigned();
            $table->foreign('idt')->references('idt')->on('tipos');
           
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
