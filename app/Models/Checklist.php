<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    public $table = 'cheklists';

    public function card() {
        return $this->belongsTo(Card::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
