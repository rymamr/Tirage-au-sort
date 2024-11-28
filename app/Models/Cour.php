<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cour
 * 
 * @property int $idcours
 * @property string $nom
 * @property Carbon $date_heure
 * @property int $idmatiere
 * @property int $idclasse
 * 
 * @property Class $class
 * @property Matiere $matiere
 * @property Collection|Interrogation[] $interrogations
 * @property Collection|Assurer[] $assurers
 *
 * @package App\Models
 */
class Cour extends Model
{
	#protected $table = 'PFX_cours';
	protected $primaryKey = 'idcours';
	public $timestamps = false;

	protected $casts = [
		'date_heure' => 'datetime',
		'idmatiere' => 'int',
		'idclasse' => 'int'
	];

	protected $fillable = [
		'nom',
		'date_heure',
		'idmatiere',
		'idclasse'
	];

	public function classe()
	{
		return $this->belongsTo(Classe::class, 'idclasse');
	}

	public function matiere()
	{
		return $this->belongsTo(Matiere::class, 'idmatiere');
	}

	public function interrogations()
	{
		return $this->hasMany(Interrogation::class, 'idcours');
	}

	public function assurers()
	{
		return $this->hasMany(Assurer::class, 'idcours');
	}
}
