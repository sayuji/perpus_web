<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UlasanRating extends Model
{
    use HasFactory;

    protected $table = 'ulasan_rating';

    protected $fillable = [
        'user_id',
        'buku_id',
        'ulasan',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
