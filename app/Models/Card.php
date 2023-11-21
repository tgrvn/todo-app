<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    public function column() {
        return $this->belongsTo(Column::class);
    }

    public function cheklists() {
        return $this->hasMany(Checklist::class, 'card_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
