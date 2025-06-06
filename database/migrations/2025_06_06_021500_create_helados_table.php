<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeladosTable extends Migration
{
    public function up(): void
    {
        Schema::create('helados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->decimal('precio', 8, 2);
            $table->string('sabor');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('helados');
    }
}
