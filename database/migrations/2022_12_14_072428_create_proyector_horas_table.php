<?php

use App\Models\Proyectores;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyector_horas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('proyector_id');
            $table->foreign('proyector_id')->references('id')->on('proyectores');
            $table->string('horario');
            $table->integer('estado')->default(1); //1:no_recogido, 2:recogido, 3:devuelto
            $table->integer('baja')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyector_horas');
    }
};
