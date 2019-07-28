<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GovernmentPositionProject
 * 
 * @property int $id
 * @property int $government_position_id
 * @property string $project_name
 * @property int $government_project_category_id
 * @property string $project_header
 * @property string $project_description_content
 * @property array $image_urls
 * @property int $inserted_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\GovernmentPosition $government_position
 * @property \App\Models\User $user
 * @property \App\Models\GovernmentProjectCategory $government_project_category
 *
 * @package App\Models
 */
class GovernmentPositionProject extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'government_position_id' => 'int',
		'government_project_category_id' => 'int',
		'image_urls' => 'json',
		'inserted_by' => 'int'
	];

	protected $fillable = [
		'government_position_id',
		'project_name',
		'government_project_category_id',
		'project_header',
		'project_description_content',
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

	public function government_project_category()
	{
		return $this->belongsTo(\App\Models\GovernmentProjectCategory::class);
	}
}
