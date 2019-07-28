<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PermissionRole
 * 
 * @property int $permission_id
 * @property int $role_id
 * 
 * @property \App\Models\Permission $permission
 * @property \App\Models\Role $role
 *
 * @package App\Models
 */
class PermissionRole extends Eloquent
{
	protected $table = 'permission_role';
	protected $primaryKey = 'permission_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'permission_id' => 'int',
		'role_id' => 'int'
	];

	public function permission()
	{
		return $this->belongsTo(\App\Models\Permission::class);
	}

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class);
	}
}
