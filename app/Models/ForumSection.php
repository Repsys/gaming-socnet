<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\ForumSection
 *
 * @property int $id
 * @property string $title
 * @property string|null $about
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $project_id
 * @property int|null $account_id
 * @property-read \App\Models\Account|null $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ForumTopic[] $forumTopics
 * @property-read int|null $forum_topics_count
 * @property-read \App\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder|ForumSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumSection whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumSection whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumSection whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumSection whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumSection whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ForumSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'about',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function topics(): HasMany
    {
        return $this->hasMany(ForumTopic::class);
    }
}
