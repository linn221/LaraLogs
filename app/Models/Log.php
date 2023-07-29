<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function Category() {
        return $this->belongsTo(Category::class);
    }

    public function Tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function Images() {
        return $this->hasMany(Image::class);
    }

    public function Emails() {
        return $this->belongsToMany(Email::class);
    }

    public function scopeSearch($query, string $keyword): void {
        $query
        ->where('title', 'like', "%$keyword%")
        ->orWhere('content', 'like', "%$keyword%");
    }


}