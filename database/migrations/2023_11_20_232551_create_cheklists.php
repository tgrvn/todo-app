<?php

use App\Models\Card;
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
        Schema::create('cheklists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('tasks_order')->nullable();
            $table->timestamps();

            $table->foreignIdFor(Card::class, 'card_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheklists');
    }
};
