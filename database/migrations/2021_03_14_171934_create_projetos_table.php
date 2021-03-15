<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table -> id();
            $table -> string('nome', 255) -> nullable();
            $table -> string('introducao', 500) -> nullable();
            $table -> string('localizacao', 255) -> nullable();
            $table -> string('custo', 22) -> nullable() -> default(0.00);
            $table -> timestamp('created_at') -> useCurrent();
            $table -> timestamp('updated_at') -> nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projetos');
    }
}
