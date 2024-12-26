<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrTeamForAppointment
 * 
 * @property int $id
 * @property int $appointment_id
 * @property int $employees_id
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrAppointment $ir_appointment
 * @property IrEmployee $ir_employee
 * @property Statut $statut
 *
 * @package App\Models
 */
class IrTeamForAppointment extends Model
{
	protected $table = 'ir_team_for_appointment';

	protected $casts = [
		'appointment_id' => 'int',
		'employees_id' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'appointment_id',
		'employees_id',
		'status_id'
	];

	public function ir_appointment()
	{
		return $this->belongsTo(IrAppointment::class, 'appointment_id');
	}

	public function ir_employee()
	{
		return $this->belongsTo(IrEmployee::class, 'employees_id');
	}

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}
}
