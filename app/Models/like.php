<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'song_id'
    ];

    public function likedBy(User $user, Rate $rate)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    
}
