<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ForumPost
 *
 * @property int $id
 * @property int $index
 * @property string $title
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $forum_topic_id
 * @property int|null $account_id
 * @property int|null $reply_to
 * @method static \Illuminate\Database\Eloquent\Builder|ForumPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumPost whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumPost whereForumTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumPost whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumPost whereReplyTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumPost whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumPost whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumPost whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'reply_to',
        'index',
        'title',
        'text',
    ];
}
