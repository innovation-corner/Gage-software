<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GovernmentStaff
 * 
 * @property int $id
 * @property string $name
 * @property int $created_by
 * @property int $government_id
 * @property string $email
 * @property string $phone
 * @property int $gender
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Government $government
 *
 * @package App\Models
 */
class GovernmentStaff extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'government_staff';

	protected $casts = [
		'created_by' => 'int',
		'government_id' => 'int',
		'gender' => 'int'
	];

	protected $fillable = [
		'name',
		'created_by',
		'government_id',
		'email',
		'phone',
		'gender'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'created_by');
	}

	public function government()
	{
		return $this->belongsTo(\App\Models\Government::class);
	}
}
