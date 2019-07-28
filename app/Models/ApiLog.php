<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class ApiLog
 * 
 * @property int $id
 * @property string $url
 * @property string $method
 * @property string $data_param
 * @property string $response
 * @property \Carbon\Carbon $created_by
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class ApiLog extends Model
{
	public $timestamps = false;

	protected $dates = [
		'created_by'
	];

	protected $fillable = [
		'url',
		'method',
		'data_param',
		'response',
		'created_by'
	];
}
