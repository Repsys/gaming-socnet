<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\ForumTopic
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $forum_section_id
 * @property int|null $account_id
 * @property-read \App\Models\Account|null $account
 * @property-read \App\Models\ForumSection $forumSection
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic query()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereForumSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ForumTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function forumSection(): BelongsTo
    {
        return $this->belongsTo(ForumSection::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(ForumAnswer::class);
    }
}
