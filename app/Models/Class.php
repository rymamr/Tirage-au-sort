<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Class
 * 
 * @property int $idclasse
 * @property string $nom
 * @property string $niveau
 * 
 * @property Collection|Cour[] $cours
 * @property Collection|Utilisateur[] $utilisateurs
 *
 * @package App\Models
 */
class Class extends Model
{
	protected $table = 'PFX_classes';
	protected $primaryKey = 'idclasse';
	public $timestamps = false;

	protected $fillable = [
		'nom',
		'niveau'
	];

	public function cours()
	{
		return $this->hasMany(Cour::class, 'idclasse');
	}

	public function utilisateurs()
	{
		return $this->hasMany(Utilisateur::class, 'idclasse');
	}
}
