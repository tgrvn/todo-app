<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsToMany(User::class, 'board_members',  'board_id', 'user_id');
    }

    public function columns() {
        return $this->hasMany(Column::class);
    }
}
