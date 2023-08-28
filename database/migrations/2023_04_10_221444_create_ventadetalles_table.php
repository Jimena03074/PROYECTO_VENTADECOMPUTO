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
        Schema::create('ventadetalles', function (Blueprint $table) {
            $table->increments('idvd');
            $table->integer('idve');
            $table->integer('idv');
            $table->integer('idcli');
            $table->integer('idp');
            $table->integer('cantidad');
            $table->double('costo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventadetalles');
    }
};
