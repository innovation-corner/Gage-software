<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GovernmentState
 * 
 * @property int $id
 * @property string $name
 * @property int $created_by
 * @property int $government_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Government $government
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $government_state_purs
 *
 * @package App\Models
 */
class GovernmentState extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'created_by' => 'int',
		'government_id' => 'int'
	];

	protected $fillable = [
		'name',
		'created_by',
		'government_id'
	];

	public function government()
	{
		return $this->belongsTo(\App\Models\Government::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'created_by');
	}

	public function government_state_purs()
	{
		return $this->hasMany(\App\Models\GovernmentStatePur::class);
	}
}
