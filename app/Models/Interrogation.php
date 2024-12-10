<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Interrogation
 * 
 * @property int $idinterro
 * @property Carbon $date_heure
 * @property int $duree
 * @property string $commentaire
 * @property int $id
 * @property int $idcours
 * 
 * @property Cour $cour
 * @property User $user
 *
 * @package App\Models
 */
class Interrogation extends Model
{
	
	#protected $table = 'PFX_interrogations';
	protected $primaryKey = 'idinterro';
	public $timestamps = false;

	protected $casts = [
		'date_heure' => 'datetime',
		'duree' => 'int',
		'id' => 'int',
		'idcours' => 'int'
	];

	protected $fillable = [
		'date_heure',
		'duree',
		'commentaire',
		'id',
		'idcours'
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
