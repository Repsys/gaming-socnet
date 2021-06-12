<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ForumAnswer
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $forum_topic_id
 * @property int|null $account_id
 * @property-read \App\Models\Account|null $account
 * @property-read \App\Models\ForumTopic $forumTopic
 * @method static \Illuminate\Database\Eloquent\Builder|ForumAnswer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumAnswer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumAnswer query()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumAnswer whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumAnswer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumAnswer whereForumTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumAnswer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumAnswer whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumAnswer whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumAnswer whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumAnswer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ForumAnswer extends Model
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

    public function forumTopic(): BelongsTo
    {
        return $this->belongsTo(ForumTopic::class);
    }
}
