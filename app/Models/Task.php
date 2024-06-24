<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'status', 'priority', 'board_id', 'assigned_user_id',
    ];

    /**
     * Get the board that owns the task.
     */
    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    /**
     * Get the user assigned to the task.
     */
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}

