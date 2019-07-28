<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GovernmentPositionPolicy
 * 
 * @property int $id
 * @property int $government_position_id
 * @property string $policy_name
 * @property int $government_policy_category_id
 * @property int $year
 * @property string $policy_header
 * @property string $policy_description_content
 * @property array $image_urls
 * @property int $inserted_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\GovernmentPosition $government_position
 * @property \App\Models\User $user
 * @property \App\Models\GovernmentPolicyCategory $government_policy_category
 *
 * @package App\Models
 */
class GovernmentPositionPolicy extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'government_position_id' => 'int',
		'government_policy_category_id' => 'int',
		'year' => 'int',
		'image_urls' => 'json',
		'inserted_by' => 'int'
	];

	protected $fillable = [
		'government_position_id',
		'policy_name',
		'government_policy_category_id',
		'year',
		'policy_header',
		'policy_description_content',
		'image_urls',
		'inserted_by'
	];

	public function government_position()
	{
		return $this->belongsTo(\App\Models\GovernmentPosition::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'inserted_by');
	}

	public function government_policy_category()
	{
		return $this->belongsTo(\App\Models\GovernmentPolicyCategory::class);
	}
}
