<?php

use App\Models\Card;
use App\Models\User;
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
        Schema::create('card_logs', function (Blueprint $table) {
            $table->id();
            $table->json('event');
            $table->timestamps();

            $table->foreignIdFor(Card::class, 'card_id');
            $table->foreignIdFor(User::class, 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_logs');
    }
};
