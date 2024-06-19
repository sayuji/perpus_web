<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Peminjaman extends Model
{
    // use HasFactory;
    protected $guarded = [];
    protected $table = 'peminjaman';
    public $timestamps = false;

    /**
     * Get the get_kategori associated with the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function get_buku(): HasOne
    {
        return $this->hasOne(Buku::class, 'id', 'buku');
    }

    public function get_user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user');
    }

    public function isAlreadyRated()
    {
        return UlasanRating::query()
            ->where('user_id', $this->user)
            ->where('buku_id', $this->buku)
            ->count() > 0;
    }
}
