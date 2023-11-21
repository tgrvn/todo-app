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
        Schema::create('cards_labels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('hex', 255);
            $table->timestamps();
        });

        DB::table('cards_labels')->insert([
            ['name' => 'Темно зелений', 'hex' => '#4bce97'],
            ['name' => 'Темно помаранчовий', 'hex' => '#7f5f02'],
            ['name' => 'Помаранчовий', 'hex' => '#a54700'],
            ['name' => 'Червоний', 'hex' => '#a54700'],
            ['name' => 'Синій', 'hex' => '#0055cc'],
            ['name' => 'Фіолетовий', 'hex' => '#0055cc'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards_labels');
    }
};
