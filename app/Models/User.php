<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $idclasse
 * @property int $idrole
 * 
 * @property Classe|null $classe
 * @property Role $role
 * @property Collection|Interrogation[] $interrogations
 * @property Collection|Assurer[] $assurers
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use Notifiable;
	#protected $table = 'PFX_users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'idclasse' => 'int',
		'idrole' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'idclasse',
		'idrole'
	];

	public function classe()
	{
		return $this->belongsTo(Classe::class, 'idclasse');
	}

	public function role()
	{
		return $this->belongsTo(Role::class, 'idrole');
	}

	public function interrogations()
	{
		return $this->hasMany(Interrogation::class, 'id');
	}

	public function assurers()
	{
		return $this->hasMany(Assurer::class, 'id');
	}
}
