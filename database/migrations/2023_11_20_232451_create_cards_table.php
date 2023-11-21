<?php

use App\Models\Column;
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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('descriptrion')->nullable();
            $table->string('cover')->nullable();
            $table->json('labels')->nullable();
            $table->dateTime('expired_at')->nullable();
            $table->timestamps();

            $table->foreignIdFor(Column::class, 'column_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
