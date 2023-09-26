<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function letters(): HasMany
    {
        return $this->hasMany(Letter::class);
    }

    /**
     * @return HasOne
     */
    public function account(): Hasone
    {
        return $this->hasOne(Account::class);
    }

    /**
     * @param $amount
     * @return bool
     */
    public function checkAccountBalance($amount): bool
    {
        return $this->account->balance >= $amount;
    }

    /**
     * @param $amount
     * @return boolean
     */
    public function debitAccountBalance($amount): bool
    {
        if (!$this->checkAccountBalance($amount)) {
            return false;
        }
        $this->account->balance -= $amount;
        return $this->account->save();
    }

    /**
     * @param $amount
     * @return boolean
     */
    public function fundAccountBalance($amount): bool
    {
        $this->account->balance += $amount;
        return $this->account->save();
    }
}
