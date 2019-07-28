<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $user_type_id
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\UserType $user_type
 * @property \Illuminate\Database\Eloquent\Collection $government_categories
 * @property \Illuminate\Database\Eloquent\Collection $government_official_post_purs
 * @property \Illuminate\Database\Eloquent\Collection $government_official_posts
 * @property \Illuminate\Database\Eloquent\Collection $government_policy_categories
 * @property \Illuminate\Database\Eloquent\Collection $government_position_policies
 * @property \Illuminate\Database\Eloquent\Collection $government_position_policy_purs
 * @property \Illuminate\Database\Eloquent\Collection $government_position_project_purs
 * @property \Illuminate\Database\Eloquent\Collection $government_position_projects
 * @property \Illuminate\Database\Eloquent\Collection $government_positions
 * @property \Illuminate\Database\Eloquent\Collection $government_project_categories
 * @property \Illuminate\Database\Eloquent\Collection $government_staffs
 * @property \Illuminate\Database\Eloquent\Collection $government_staff_office_purs
 * @property \Illuminate\Database\Eloquent\Collection $government_state_purs
 * @property \Illuminate\Database\Eloquent\Collection $government_states
 * @property \Illuminate\Database\Eloquent\Collection $roles
 *
 * @package App\Models
 */
class User extends Authenticatable  implements JWTSubject
{

    use Notifiable;

	protected $casts = [
		'user_type_id' => 'int'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'user_type_id',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function user_type()
	{
		return $this->belongsTo(\App\Models\UserType::class);
	}

	public function government_categories()
	{
		return $this->hasMany(\App\Models\GovernmentCategory::class, 'created_by');
	}

	public function government_official_post_purs()
	{
		return $this->hasMany(\App\Models\GovernmentOfficialPostPur::class, 'pur_user_id');
	}

	public function government_official_posts()
	{
		return $this->hasMany(\App\Models\GovernmentOfficialPost::class, 'posted_by');
	}

	public function government_policy_categories()
	{
		return $this->hasMany(\App\Models\GovernmentPolicyCategory::class, 'created_by');
	}

	public function government_position_policies()
	{
		return $this->hasMany(\App\Models\GovernmentPositionPolicy::class, 'inserted_by');
	}

	public function government_position_policy_purs()
	{
		return $this->hasMany(\App\Models\GovernmentPositionPolicyPur::class, 'pur_user_id');
	}

	public function government_position_project_purs()
	{
		return $this->hasMany(\App\Models\GovernmentPositionProjectPur::class, 'pur_user_id');
	}

	public function government_position_projects()
	{
		return $this->hasMany(\App\Models\GovernmentPositionProject::class, 'inserted_by');
	}

	public function government_positions()
	{
		return $this->hasMany(\App\Models\GovernmentPosition::class, 'created_by');
	}

	public function government_project_categories()
	{
		return $this->hasMany(\App\Models\GovernmentProjectCategory::class, 'created_by');
	}

	public function government_staffs()
	{
		return $this->hasMany(\App\Models\GovernmentStaff::class, 'created_by');
	}

	public function government_staff_office_purs()
	{
		return $this->hasMany(\App\Models\GovernmentStaffOfficePur::class, 'pur_user_id');
	}

	public function government_state_purs()
	{
		return $this->hasMany(\App\Models\GovernmentStatePur::class, 'pur_user_id');
	}

	public function government_states()
	{
		return $this->hasMany(\App\Models\GovernmentState::class, 'created_by');
	}

	public function roles()
	{
		return $this->belongsToMany(\App\Models\Role::class);
	}

    public function getJWTIdentifier()
    {
        // TODO: Implement getJWTIdentifier() method.
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCustomClaims() method.
        return [];
    }
}
