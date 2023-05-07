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
        Schema::create('users', function (Blueprint $table) {
            // $table->id('idUser');
            $table->id();
            $table->string('name',35);
            $table->string('username',20);
            $table->string('password');
            $table->string('email',50)->unique(6);
            $table->string('telepon',20);
            // $table->enum('level',['siswa','guru']);
            $table->tinyInteger("role")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
