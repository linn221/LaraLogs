<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    public function Category() {
        return $this->belongsTo(Category::class);
    }

    public function Tags() {
        return $this->belongsToMany(Tag::class);
    }
}