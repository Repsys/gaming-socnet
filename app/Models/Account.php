<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * App\Models\Account
 *
 * @property int $id
 * @property string $email
 * @property string $login
 * @property string $password
 * @property string|null $avatar
 * @property bool $is_publisher
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BlogPost[] $blogPosts
 * @property-read int|null $blog_posts_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\User|null $profile
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @property-read \App\Models\Publisher|null $publisher
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account query()
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereAvatar($value)
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

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function publisher(): HasOne
    {
        return $this->hasOne(Publisher::class);
    }

    public function profile(): HasOne
    {
        if ($this->is_publisher)
            return $this->publisher();

        return $this->user();
    }

    public function blogPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Получить полное имя аккаунта
     * @return array
     */
    public function getFullName() : string
    {
        if ($this->profile()->exists()) {
            if ($this->is_publisher) {
                $fullName = $this->profile->name;
            } else {
                if (isset($this->profile->name)) {
                    $fullName = $this->profile->name;
                    if (isset($this->profile->surname)) {
                        $fullName .= ' ' . $this->profile->surname;
                    }
                }
            }
        }
        if (!isset($fullName)) {
            $fullName = $this->login;
        }
        return $fullName;
    }

    /**
     * Получить информацию об аккаунте и его профиле
     * @return array
     */
    public function getAccountData() : array
    {
        return [
            'account' => $this,
            'profile' => $this->profile,
            'fullName' => $this->getFullName(),
        ];
    }

    /**
     * Получить информацию об аккаунте и его профиле по логину
     * @param $login
     * @return array
     */
    public static function getAccountDataByLogin($login) : array
    {
        $account = Account::whereLogin($login)->first();

        if (!$account || !$account->profile) {
            abort(404, "The Account was not found");
        }

        return $account->getAccountData();
    }

}
