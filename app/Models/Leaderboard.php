<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'song_id',
        'artist_name',
        'song_name',
        'count',
    ];

    /**
     * Get the likes for the rate.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
