<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProjectRole
 *
 * @property int $id
 * @property string $name
 * @property bool $is_super
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $project_id
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectRole whereIsSuper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectRole whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectRole whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProjectRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_super',
    ];
}
