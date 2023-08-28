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
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('idcli');
            $table->string('nombre',60);
            $table->string('rfc',10);
            $table->string('telefono',10);
            $table->string('direccion',300);
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
