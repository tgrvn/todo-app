<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    

    protected $hidden = [
        'pivot'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'board_members',  'board_id', 'user_id');
    }

    public function columns() {
        return $this->hasMany(Column::class);
    }

    public function theme() {
        return $this->belongsTo(BoardTheme::class);
    }
}
