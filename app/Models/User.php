<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * 
 * @property int $id
 * @property int $employees_id
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string $role_employee
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrEmployee $ir_employee
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;
	protected $table = 'users';

	protected $casts = [
		'employees_id' => 'int',
		'email_verified_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'employees_id',
		'email',
		'email_verified_at',
		'password',
		'role_employee',
		'remember_token'
	];

	public function ir_employee()
	{
		return $this->belongsTo(IrEmployee::class, 'employees_id');
	}
}
