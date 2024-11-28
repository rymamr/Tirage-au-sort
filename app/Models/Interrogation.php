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
 * @property int $idutilisateur
 * @property int $idcours
 * 
 * @property Cour $cour
 * @property Utilisateur $utilisateur
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
		'idutilisateur' => 'int',
		'idcours' => 'int'
	];

	protected $fillable = [
		'date_heure',
		'duree',
		'commentaire',
		'idutilisateur',
		'idcours'
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
