<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['log_id', 'caption', 'uri'];

    public function Log() {
        return $this->belongsTo(Log::class);
    }
}
