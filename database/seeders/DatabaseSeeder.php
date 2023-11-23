<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Board;
use App\Models\Card;
use App\Models\Checklist;
use App\Models\Column;
use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)
            ->has(
                Board::factory()->has(
                    Column::factory()->has(
                        Card::factory()->has(
                            Checklist::factory()->has(
                                Task::factory()->count(2)
                            )->count(2),
                            'cheklists'
                        )
                            ->has(Comment::factory()->count(3)->state(['user_id' => 1]))
                            ->count(2)
                    )->count(3)
                )->count(18)
            )->create();
    }
}
