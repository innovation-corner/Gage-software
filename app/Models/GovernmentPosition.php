<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GovernmentPosition
 * 
 * @property int $id
 * @property string $name
 * @property int $government_category_id
 * @property int $created_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\User $user
 * @property \App\Models\GovernmentCategory $government_category
 * @property \Illuminate\Database\Eloquent\Collection $government_position_policies
 * @property \Illuminate\Database\Eloquent\Collection $government_position_policy_purs
 * @property \Illuminate\Database\Eloquent\Collection $government_position_project_purs
 * @property \Illuminate\Database\Eloquent\Collection $government_position_projects
 *
 * @package App\Models
 */
class GovernmentPosition extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'government_category_id' => 'int',
		'created_by' => 'int'
	];

	protected $fillable = [
		'name',
		'government_category_id',
		'created_by'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'created_by');
	}

	public function government_category()
	{
		return $this->belongsTo(\App\Models\GovernmentCategory::class);
	}

	public function government_position_policies()
	{
		return $this->hasMany(\App\Models\GovernmentPositionPolicy::class);
	}

	public function government_position_policy_purs()
	{
		return $this->hasMany(\App\Models\GovernmentPositionPolicyPur::class, 'government_position_policy_id');
	}

	public function government_position_project_purs()
	{
		return $this->hasMany(\App\Models\GovernmentPositionProjectPur::class, 'government_position_project_id');
	}

	public function government_position_projects()
	{
		return $this->hasMany(\App\Models\GovernmentPositionProject::class);
	}
}
