<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Photo
 *
 * @property integer $id
 * @property string $name
 * @property integer $user_id
 * @property integer $event_id
 * @property integer $watermark_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $user
 * @property-read \App\Event $event
 * @property-read \App\Watermark $watermark
 * @method static \Illuminate\Database\Query\Builder|\App\Photo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Photo whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Photo whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Photo whereEventId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Photo whereWatermarkId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Photo whereUpdatedAt($value)
 */
	class Photo extends \Eloquent {}
}

namespace App{
/**
 * App\PhotoUserTag
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $photo_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Photo[] $photo
 * @method static \Illuminate\Database\Query\Builder|\App\PhotoUserTag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PhotoUserTag whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PhotoUserTag wherePhotoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PhotoUserTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PhotoUserTag whereUpdatedAt($value)
 */
	class PhotoUserTag extends \Eloquent {}
}

namespace App{
/**
 * App\Watermark
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $top_position
 * @property integer $left_position
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Photo[] $photo
 * @method static \Illuminate\Database\Query\Builder|\App\Watermark whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Watermark whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Watermark whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Watermark whereTopPosition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Watermark whereLeftPosition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Watermark whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Watermark whereUpdatedAt($value)
 */
	class Watermark extends \Eloquent {}
}

namespace App{
/**
 * App\UserPhoto
 *
 * @property integer $id
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $user
 * @property-read \App\Photo $photo
 * @method static \Illuminate\Database\Query\Builder|\App\UserPhoto whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UserPhoto whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UserPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\UserPhoto whereUpdatedAt($value)
 */
	class UserPhoto extends \Eloquent {}
}

namespace App{
/**
 * App\Discipline
 *
 * @property integer $id
 * @property string $name
 * @property string $logo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $event
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $user
 * @method static \Illuminate\Database\Query\Builder|\App\Discipline whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discipline whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discipline whereLogo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discipline whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Discipline whereUpdatedAt($value)
 */
	class Discipline extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $pseudo
 * @property string $email
 * @property string $password
 * @property string $profile_pic
 * @property boolean $active
 * @property string $preferences
 * @property string $site_web
 * @property string $facebook
 * @property string $google
 * @property string $twitter
 * @property string $biography
 * @property integer $role_id
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Discipline[] $discipline
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Photo[] $photo
 * @property-read \App\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $event
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePseudo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereProfilePic($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePreferences($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereSiteWeb($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereFacebook($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereGoogle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereTwitter($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereBiography($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Event
 *
 * @property integer $id
 * @property string $name
 * @property string $adresse
 * @property string $date_event
 * @property string $city
 * @property integer $user_id
 * @property integer $discipline_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Discipline $discipline
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Photo[] $photo
 * @property-read \App\Event $user
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereAdresse($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereDateEvent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereDisciplineId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereUpdatedAt($value)
 */
	class Event extends \Eloquent {}
}

namespace App{
/**
 * App\UserDiscipline
 *
 * @property-read \App\User $user
 * @property-read \App\Discipline $discipline
 */
	class UserDiscipline extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $user
 * @method static \Illuminate\Database\Query\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Role whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\Comment
 *
 * @property integer $id
 * @property string $text
 * @property integer $user_id
 * @property integer $photo_id
 * @property integer $comment_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comment
 * @property-read \App\User $user
 * @property-read \App\Photo $photo
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment wherePhotoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereCommentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Comment whereUpdatedAt($value)
 */
	class Comment extends \Eloquent {}
}

