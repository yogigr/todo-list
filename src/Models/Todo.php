<?php

namespace YogiGr\TodoList\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['todo', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
