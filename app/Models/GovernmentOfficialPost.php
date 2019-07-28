<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GovernmentOfficialPost
 * 
 * @property int $id
 * @property string $header
 * @property string $content
 * @property string $title
 * @property int $posted_by
 * @property int $government_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Government $government
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $government_official_post_purs
 *
 * @package App\Models
 */
class GovernmentOfficialPost extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'posted_by' => 'int',
		'government_id' => 'int'
	];

	protected $fillable = [
		'header',
		'content',
		'title',
		'posted_by',
		'government_id'
	];

	public function government()
	{
		return $this->belongsTo(\App\Models\Government::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'posted_by');
	}

	public function government_official_post_purs()
	{
		return $this->hasMany(\App\Models\GovernmentOfficialPostPur::class);
	}
}
