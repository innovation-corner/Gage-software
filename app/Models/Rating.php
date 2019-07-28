<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Rating
 * 
 * @property int $id
 * @property string $name
 * @property int $number_of_stars
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $udated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $government_official_post_purs
 * @property \Illuminate\Database\Eloquent\Collection $government_position_policy_purs
 * @property \Illuminate\Database\Eloquent\Collection $government_position_project_purs
 * @property \Illuminate\Database\Eloquent\Collection $government_staff_office_purs
 * @property \Illuminate\Database\Eloquent\Collection $government_state_purs
 *
 * @package App\Models
 */
class Rating extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'number_of_stars' => 'int'
	];

	protected $dates = [
		'udated_at'
	];

	protected $fillable = [
		'name',
		'number_of_stars',
		'udated_at'
	];

	public function government_official_post_purs()
	{
		return $this->hasMany(\App\Models\GovernmentOfficialPostPur::class);
	}

	public function government_position_policy_purs()
	{
		return $this->hasMany(\App\Models\GovernmentPositionPolicyPur::class);
	}

	public function government_position_project_purs()
	{
		return $this->hasMany(\App\Models\GovernmentPositionProjectPur::class);
	}

	public function government_staff_office_purs()
	{
		return $this->hasMany(\App\Models\GovernmentStaffOfficePur::class);
	}

	public function government_state_purs()
	{
		return $this->hasMany(\App\Models\GovernmentStatePur::class);
	}
}
