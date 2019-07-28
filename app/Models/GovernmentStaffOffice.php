<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GovernmentStaffOffice
 * 
 * @property int $id
 * @property int $government_staff_id
 * @property int $government_position_id
 * @property int $year
 * @property int $created_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $government_staff_office_purs
 *
 * @package App\Models
 */
class GovernmentStaffOffice extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'government_staff_id' => 'int',
		'government_position_id' => 'int',
		'year' => 'int',
		'created_by' => 'int'
	];

	protected $fillable = [
		'government_staff_id',
		'government_position_id',
		'year',
		'created_by'
	];

	public function government_staff_office_purs()
	{
		return $this->hasMany(\App\Models\GovernmentStaffOfficePur::class);
	}
}
