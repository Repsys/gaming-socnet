<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 */
	class Account extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $post_id
 * @property int $account_id
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
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
 */
	class ForumPost extends \Eloquent {}
}

namespace App\Models{
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
 */
	class ForumTopic extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $project_id
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $name
 * @property string $about
 * @property bool $is_closed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $account_id
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIsClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 */
	class Project extends \Eloquent {}
}

namespace App\Models{
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
 */
	class ProjectRole extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Publisher
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $about
 * @property int $account_id
 * @property-read \App\Models\Account $account
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereName($value)
 */
	class Publisher extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $about
 * @property int $account_id
 * @property-read \App\Models\Account $account
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSurname($value)
 */
	class User extends \Eloquent {}
}

