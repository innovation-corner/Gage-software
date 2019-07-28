<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $permissions
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Role extends Eloquent
{
	protected $fillable = [
		'name',
		'display_name',
		'description'
	];

	public function permissions()
	{
		return $this->belongsToMany(\App\Models\Permission::class);
	}

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class);
	}
}
