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
        Schema::create('coches', function (Blueprint $table) {
            $table->id();
            $table->string('imagen');
            $table->text('descripcion');
            $table->string('color');
            $table->integer('kilometros');
            $table->integer('fabricacion');
            $table->integer('precio');
            $table->enum('nuevo', ["SI", "NO"])->default('SI');
            $table->foreignId('marca_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tipo_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vendido_id')->nullable();
            $table->foreignId('deseo_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coches');
    }
};
