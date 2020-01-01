<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string $user_name
 * @property string $full_name
 * @property string $email
 * @property int $gold
 * @property string $fbid facebook id
 * @property string $password
 * @property string|null $remember_token
 * @property string $avatar tên avt
 * @property int $administrator
 * @property int $role
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string|null $token_ios
 * @property string|null $token_adr
 * @property string|null $imei
 * @property int $lock_active
 * @property int $type 0:other; 1:ttv
 * @property int|null $userid
 * @property int|null $usergroupid
 * @property int|null $membergroupids
 * @property int|null $displaygroupid
 * @property string|null $usertitle
 * @property int|null $avatarrevision
 * @property string|null $rank
 * @property string|null $opentag
 * @property string|null $closetag
 * @property int $nomination_votes
 * @property int $xu
 * @property string|null $bot
 * @property string|null $badge
 * @property int $convert_day
 * @property int $convert_week
 * @property int $convert_month
 * @property int $convert_year
 * @property int $convert_all
 * @property int $comment_day
 * @property int $comment_week
 * @property int $comment_month
 * @property int $comment_year
 * @property int $comment_all
 * @property string|null $adv_off_datetime
 * @property int $bagde
 * @property string|null $web_token
 * @property string|null $admin_token
 * @property int $web_convert_month đếm từ web số convert tháng - có reset
 * @property int $web_convert_all đếm từ web số convert
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAdminToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAdministrator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAdvOffDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatarrevision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBadge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBagde($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereClosetag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCommentAll($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCommentDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCommentMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCommentWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCommentYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereConvertAll($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereConvertDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereConvertMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereConvertWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereConvertYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDisplaygroupid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFbid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLockActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMembergroupids($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNominationVotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereOpentag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTokenAdr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTokenIos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsergroupid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsertitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWebConvertAll($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWebConvertMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWebToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereXu($value)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
