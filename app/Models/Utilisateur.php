<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Utilisateur
 * 
 * @property int $idutilisateur
 * @property string|null $nom
 * @property string $prenom
 * @property string $mail
 * @property string $login
 * @property string $mdp
 * @property int|null $idclasse
 * @property int $idrole
 * 
 * @property Class|null $class
 * @property Role $role
 * @property Collection|Interrogation[] $interrogations
 * @property Collection|Assurer[] $assurers
 *
 * @package App\Models
 */
class Utilisateur extends Model
{
	protected $table = 'PFX_utilisateurs';
	protected $primaryKey = 'idutilisateur';
	public $timestamps = false;

	protected $casts = [
		'idclasse' => 'int',
		'idrole' => 'int'
	];

	protected $fillable = [
		'nom',
		'prenom',
		'mail',
		'login',
		'mdp',
		'idclasse',
		'idrole'
	];

	public function class()
	{
		return $this->belongsTo(Class::class, 'idclasse');
	}

	public function role()
	{
		return $this->belongsTo(Role::class, 'idrole');
	}

	public function interrogations()
	{
		return $this->hasMany(Interrogation::class, 'idutilisateur');
	}

	public function assurers()
	{
		return $this->hasMany(Assurer::class, 'idutilisateur');
	}
}
