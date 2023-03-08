<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'content',
        'tag',
    ];

    // public function tag()
    // {
    //     return $this->belongsTo(MstTag::class);
    // }
}
