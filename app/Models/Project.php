<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Validator;

/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $name
 * @property string $about
 * @property bool $is_closed
 * @property string $domain
 * @property string|null $preview_image
 * @property string|null $overview
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $account_id
 * @property-read \App\Models\Account $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ForumSection[] $forumSections
 * @property-read int|null $forum_sections_count
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIsClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePreviewImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about',
        'domain',
        'overview',
    ];

    public static function getByDomainOrFail($domain)
    {
        $validator = Validator::make(['domain' => $domain],
            ['domain' => 'string']);
        if ($validator->fails()) {
            abort(404);
        }

        return Project::whereDomain($domain)->firstOrFail();
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function forumSections(): HasMany
    {
        return $this->hasMany(ForumSection::class);
    }
}
