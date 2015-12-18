<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $permissions
 * @property string $last_login
 * @property string $first_name
 * @property string $last_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePermissions($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLastLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 */
	class User {}
}

namespace App{
/**
 * App\MarkerGroup
 *
 * @property integer $id
 * @property string $name
 * @property string $longname
 * @property string $ico
 * @property string $metakey
 * @property string $metadesk
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\App\Marker[] $markers
 * @method static \Illuminate\Database\Query\Builder|\App\MarkerGroup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MarkerGroup whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MarkerGroup whereLongname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MarkerGroup whereIco($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MarkerGroup whereMetakey($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MarkerGroup whereMetadesk($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MarkerGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MarkerGroup whereUpdatedAt($value)
 */
	class MarkerGroup {}
}

namespace App{
/**
 * App\Ingridient
 *
 * @property integer $id
 * @property integer $post_id
 * @property string $name
 * @property string $img
 * @property string $quantity
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Post $post
 * @method static \Illuminate\Database\Query\Builder|\App\Ingridient whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ingridient wherePostId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ingridient whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ingridient whereImg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ingridient whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ingridient whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Ingridient whereUpdatedAt($value)
 */
	class Ingridient {}
}

namespace App{
/**
 * App\MarkerCrossPost
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $marker_id
 * @property integer $post_id
 * @method static \Illuminate\Database\Query\Builder|\App\MarkerCrossPost whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MarkerCrossPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MarkerCrossPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MarkerCrossPost whereMarkerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MarkerCrossPost wherePostId($value)
 */
	class MarkerCrossPost {}
}

namespace App{
/**
 * App\Marker
 *
 * @property integer $id
 * @property string $name
 * @property string $longname
 * @property string $ico
 * @property string $metakey
 * @property string $metadesk
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Marker whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Marker whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Marker whereLongname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Marker whereIco($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Marker whereMetakey($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Marker whereMetadesk($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Marker whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Marker whereUpdatedAt($value)
 */
	class Marker {}
}

namespace App{
/**
 * App\Step
 *
 * @property integer $id
 * @property integer $post_id
 * @property string $img
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Post $post
 * @method static \Illuminate\Database\Query\Builder|\App\Step whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Step wherePostId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Step whereImg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Step whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Step whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Step whereUpdatedAt($value)
 */
	class Step {}
}

namespace App{
/**
 * App\Post
 *
 * @property integer $id
 * @property string $title
 * @property integer $user_id
 * @property string $note
 * @property string $text
 * @property string $img
 * @property string $timecook
 * @property string $calory
 * @property string $metakey
 * @property string $metadesc
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Step[] $steps
 * @property-read \Illuminate\Database\Eloquent\Collection|\Ingridient[] $ingridients
 * @property \Illuminate\Database\Eloquent\Collection|\App\Marker[] $markers
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereImg($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereTimecook($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereCalory($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereMetakey($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereMetadesc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereUpdatedAt($value)
 */
	class Post {}
}

