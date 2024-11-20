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
 * @property int $idutilisateur
 * 
 * @property Cour $cour
 * @property Utilisateur $utilisateur
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
		'idutilisateur' => 'int'
	];

	public function cour()
	{
		return $this->belongsTo(Cour::class, 'idcours');
	}

	public function utilisateur()
	{
		return $this->belongsTo(Utilisateur::class, 'idutilisateur');
	}
}
