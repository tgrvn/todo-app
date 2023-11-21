<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('board_roles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
        });

        DB::table('board_roles')->insert([
            ['title' => 'editor'],
            ['title' => 'spectator'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_roles');
    }
};
