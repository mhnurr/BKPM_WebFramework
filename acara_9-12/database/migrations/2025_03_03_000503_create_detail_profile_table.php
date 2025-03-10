<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function Symfony\Component\String\u;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('detail_profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->unique(); // Kolom terbaru
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address');
            $table->string('nomor_tlp');
            $table->date('ttl');
            $table->string('foto');  
            $table->rememberToken();
            $table->timestamps();          
        });
    }

    // public function up(): void
    // {
    //     Schema::create('detail_profile', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_profile');
    }
};
