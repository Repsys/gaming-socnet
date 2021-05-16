<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * App\Models\Account
 *
 * @property int $id
 * @property string $email
 * @property string $login
 * @property string $password
 * @property bool $is_publisher
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Publisher|null $publisher
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account query()
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereIsPublisher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Account extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'login',
    ];

    protected $hidden = [
        'password',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function publisher()
    {
        return $this->hasOne(Publisher::class);
    }

    public function profile()
    {
        if ($this->is_publisher)
            return $this->publisher();

        return $this->user();
    }

}
