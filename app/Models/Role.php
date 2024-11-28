<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $idrole
 * @property string $typerole
 * 
 * @property Collection|Utilisateur[] $utilisateurs
 *
 * @package App\Models
 */
class Role extends Model
{
	#protected $table = 'PFX_roles';
	protected $primaryKey = 'idrole';
	public $timestamps = false;

	protected $fillable = [
		'typerole'
	];

	public function utilisateurs()
	{
		return $this->hasMany(Utilisateur::class, 'idrole');
	}
}
