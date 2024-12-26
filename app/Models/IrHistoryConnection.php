<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrHistoryConnection
 * 
 * @property int $id
 * @property int $employees_id
 * @property string $ip_address
 * @property string $user_agent
 * @property Carbon $connexion_time
 * @property Carbon|null $deconnexion_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrEmployee $ir_employee
 *
 * @package App\Models
 */
class IrHistoryConnection extends Model
{
	protected $table = 'ir_history_connection';

	protected $casts = [
		'employees_id' => 'int',
		'connexion_time' => 'datetime',
		'deconnexion_time' => 'datetime'
	];

	protected $fillable = [
		'employees_id',
		'ip_address',
		'user_agent',
		'connexion_time',
		'deconnexion_time'
	];

	public function ir_employee()
	{
		return $this->belongsTo(IrEmployee::class, 'employees_id');
	}
}
