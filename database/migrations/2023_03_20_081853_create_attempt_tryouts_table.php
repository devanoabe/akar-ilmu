<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Tryout;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attempttryouts', function (Blueprint $table) {
            // $table->id('idAttempt');
            $table->id();
            $table->foreignIdFor(User::class)->constrained('users');
            $table->foreignIdFor(Tryout::class)->constrained('tryouts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attempttryouts');
    }
};
