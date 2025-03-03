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
        Schema::create('Cliente', function (Blueprint $table) {
            $table->bigIncrements('recnum')->unsigned();
            $table->decimal('empresa', 4, 0);
            $table->decimal('codigo', 14, 0)->unique();
            $table->string('razao_social', 255);
            $table->enum('tipo', ['PJ', 'PF']);
            $table->string('cpf_cnpj', 14);

            $table->primary(['recnum', 'empresa', 'codigo']);

            $table->foreign('empresa')
                ->references('codigo')
                ->on('Empresa')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cliente');
    }
};
