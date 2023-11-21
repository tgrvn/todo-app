<?php

use App\Models\Board;
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
        Schema::create('board_logs', function (Blueprint $table) {
            $table->id();
            $table->json('event');
            $table->timestamps();

            $table->foreignIdFor(Board::class, 'board_id')->onDelete('cascade');
            $table->foreignIdFor(User::class, 'member_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_logs');
    }
};
