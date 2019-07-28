<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GovernmentProjectCategory
 * 
 * @property int $id
 * @property string $name
 * @property int $parent_category_id
 * @property int $created_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $government_position_projects
 *
 * @package App\Models
 */
class GovernmentProjectCategory extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'parent_category_id' => 'int',
		'created_by' => 'int'
	];

	protected $fillable = [
		'name',
		'parent_category_id',
		'created_by'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'created_by');
	}

	public function government_position_projects()
	{
		return $this->hasMany(\App\Models\GovernmentPositionProject::class);
	}
}
