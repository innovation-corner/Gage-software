<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Government
 * 
 * @property int $id
 * @property string $name
 * @property int $created_by
 * @property int $country_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $government_official_posts
 * @property \Illuminate\Database\Eloquent\Collection $government_staffs
 * @property \Illuminate\Database\Eloquent\Collection $government_states
 *
 * @package App\Models
 */
class Government extends Eloquent
{
	protected $casts = [
		'created_by' => 'int',
		'country_id' => 'int'
	];

	protected $fillable = [
		'name',
		'created_by',
		'country_id'
	];

	public function government_official_posts()
	{
		return $this->hasMany(\App\Models\GovernmentOfficialPost::class);
	}

	public function government_staffs()
	{
		return $this->hasMany(\App\Models\GovernmentStaff::class);
	}

	public function government_states()
	{
		return $this->hasMany(\App\Models\GovernmentState::class);
	}
}
