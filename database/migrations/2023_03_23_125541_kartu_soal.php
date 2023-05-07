<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Soal;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kartusoals', function (Blueprint $table) {
            // $table->id('idKartu');
            $table->id();
            $table->foreignIdFor(Soal::class)->constrained('soals');
            $table->string('kunci',150);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartusoals');
    }
};
