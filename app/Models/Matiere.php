<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Matiere
 * 
 * @property int $idmatiere
 * @property string $nom
 * 
 * @property Collection|Cour[] $cours
 *
 * @package App\Models
 */
class Matiere extends Model
{
	#protected $table = 'PFX_matieres';
	protected $primaryKey = 'idmatiere';
	public $timestamps = false;

	protected $fillable = [
		'nom'
	];

	public function cours()
	{
		return $this->hasMany(Cour::class, 'idmatiere');
	}
}
