<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

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
class Classe extends Model
{
	use HasFactory, Notifiable;

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

	public function utilisateurs()
	{
		return $this->hasMany(Utilisateur::class, 'idclasse');
	}
}
