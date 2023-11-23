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
        Schema::create('board_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('board_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id')->default(1);
            $table->boolean('is_creator')->default(true); //for tests
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('board_id')->references('id')->on('boards')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('board_roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_members');
    }
};
