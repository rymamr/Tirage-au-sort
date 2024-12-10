<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Classe
 * 
 * @property int $idclasse
 * @property string $nom
 * @property string $niveau
 * 
 * @property Collection|Cour[] $cours
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Classe extends Model
{
	#protected $table = 'PFX_classes';
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

	public function users()
	{
		return $this->hasMany(User::class, 'idclasse');
	}

	public function students()
    {
        return $this->hasMany(User::class, 'idclasse'); // 'idclasse' est la clé étrangère dans la table users
    }
}
