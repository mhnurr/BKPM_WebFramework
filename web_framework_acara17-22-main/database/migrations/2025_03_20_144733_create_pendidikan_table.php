<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id(); // Primary key otomatis
            $table->string('nama'); // Kolom nama
            $table->text('deskripsi')->nullable(); // Kolom deskripsi (bisa null)
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendidikan');
    }
};
