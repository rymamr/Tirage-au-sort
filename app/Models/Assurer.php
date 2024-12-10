<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Assurer
 * 
 * @property int $idcours
 * @property int $id
 * 
 * @property Cour $cour
 * @property User $user
 *
 * @package App\Models
 */
class Assurer extends Model
{
	protected $table = 'assurer';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idcours' => 'int',
		'id' => 'int'
	];

	public function cour()
	{
		return $this->belongsTo(Cour::class, 'idcours');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id');
	}
}
