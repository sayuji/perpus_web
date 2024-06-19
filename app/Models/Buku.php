<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Buku extends Model
{
    // use HasFactory;
    protected $guarded = [];
    protected $table = 'buku';
    public $timestamps = false;

    /**
     * Get the get_kategori associated with the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function get_kategori(): HasOne
    {
        return $this->hasOne(Kategori::class, 'id', 'kategori');
    }

    public function isFavoriteByUser()
    {
        $user = Auth::user();

        if ($user) {
            return $user->favoriteBooks()->where('buku_id', $this->id)->exists();
        }

        return false;
    }

    public function ulasanRatings()
    {
        return $this->hasMany(UlasanRating::class);
    }

    public function hasRating() {
        return $this->ulasanRatings->count() > 0;
    }

    public function countRating()
    {
        return $this->ulasanRatings->pluck('rating')->avg();
    }
}
