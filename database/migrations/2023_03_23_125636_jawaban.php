<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Soal;
use App\Models\KartuSoal;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jawabans', function (Blueprint $table) {
            // $table->id('idJawaban');
            $table->id();
            $table->foreignIdFor(User::class)->constrained('users');
            $table->foreignIdFor(Soal::class)->constrained('soals');
            $table->foreignIdFor(KartuSoal::class)->constrained('kartusoals');
            $table->string('inputJawaban',150);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawabans');
    }
};
