<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'title',
        'text',
        'profil_id',
        'user_id',
    ];

    /**
     * Get the products for the blog post.
     */
    public function letters(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
