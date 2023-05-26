<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Conversation extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'letter_id',
        'user_id',
    ];

    public function chat(){
//        $sorted = $collection->sortBy([
//            fn (array $a, array $b) => $a['name'] <=> $b['name'],
//            fn (array $a, array $b) => $b['age'] <=> $a['age'],
//        ]);
//
//        $sorted->values()->all();)

    }

    /**
     * @return HasOne
     */
    public function letter(): HasOne
    {
        return $this->hasOne(Letter::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
