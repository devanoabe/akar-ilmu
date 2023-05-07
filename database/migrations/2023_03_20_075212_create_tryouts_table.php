<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\MataPelajaran;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tryouts', function (Blueprint $table) {
            // $table->id('idTryout');
            $table->id();
            $table->string('namaTryout',35);
            $table->string('detailTryout',35);
            $table->foreignIdFor(User::class)->constrained('users');
            $table->foreignIdFor(MataPelajaran::class)->constrained('matapelajarans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tryouts');
    }
};
