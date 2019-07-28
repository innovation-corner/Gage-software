<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GovernmentStatePur
 * 
 * @property int $id
 * @property int $pur_user_id
 * @property int $rating_id
 * @property string $remark
 * @property int $government_state_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\GovernmentState $government_state
 * @property \App\Models\User $user
 * @property \App\Models\Rating $rating
 *
 * @package App\Models
 */
class GovernmentStatePur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'pur_user_id' => 'int',
		'rating_id' => 'int',
		'government_state_id' => 'int'
	];

	protected $fillable = [
		'pur_user_id',
		'rating_id',
		'remark',
		'government_state_id'
	];

	public function government_state()
	{
		return $this->belongsTo(\App\Models\GovernmentState::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'pur_user_id');
	}

	public function rating()
	{
		return $this->belongsTo(\App\Models\Rating::class);
	}
}
