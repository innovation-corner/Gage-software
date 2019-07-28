<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 28 Jul 2019 19:19:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ApiLog
 * 
 * @property int $id
 * @property string $url
 * @property string $method
 * @property string $data_param
 * @property string $response
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 *
 * @package App\Models
 */
class ApiLog extends Eloquent
{
	public $timestamps = false;

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'url',
		'method',
		'data_param',
		'response',
		'created',
		'modified'
	];
}
