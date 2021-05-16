<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ForumTopic
 *
 * @property int $id
 * @property string $name
 * @property string $about
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $project_id
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic query()
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForumTopic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ForumTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about',
    ];
}
