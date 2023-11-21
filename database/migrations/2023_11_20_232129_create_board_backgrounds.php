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
        Schema::create('board_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->enum('type', ['color', 'gradient']);
            $table->string('class_name', 255);
        });

        DB::table('board_backgrounds')->insert([
            ['name' => 'Сірий', 'type' => 'color', 'class_name' => 'gray-background'],
            ['name' => 'Синій', 'type' => 'color', 'class_name' => 'blue-backgroud'],
            ['name' => 'Зелений', 'type' => 'color', 'class_name' => 'green-background'],
            ['name' => 'Фіолетовий', 'type' => 'color', 'class_name' => 'violet-background'],
            ['name' => 'Блакитний', 'type' => 'color', 'class_name' => 'cyan-background'],
            ['name' => 'Рожевий', 'type' => 'color', 'class_name' => 'pinc-background'],
            ['name' => 'Діско', 'type' => 'gradient', 'class_name' => 'disco-gradient'],
            ['name' => 'Океан', 'type' => 'gradient', 'class_name' => 'ocean-gradien'],
            ['name' => 'Огірковий', 'type' => 'gradient', 'class_name' => 'cucumber-gradient'],
            ['name' => 'Аква', 'type' => 'gradient', 'class_name' => 'aqua-gradient'],
            ['name' => 'Ліловий', 'type' => 'gradient', 'class_name' => 'lilly-gradient'],
            ['name' => 'Мімоза', 'type' => 'gradient', 'class_name' => 'b-mimosa-gradient'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boards_backgrounds');
    }
};
