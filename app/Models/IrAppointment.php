<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrAppointment
 * 
 * @property int $id
 * @property int $prospects_id
 * @property string $location_appointment
 * @property string|null $description_appointment
 * @property string $hour_appointment
 * @property Carbon $date_appointment
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrProspect $ir_prospect
 * @property Statut $statut
 * @property Collection|IrTeamForAppointment[] $ir_team_for_appointments
 *
 * @package App\Models
 */
class IrAppointment extends Model
{
	protected $table = 'ir_appointment';

	protected $casts = [
		'prospects_id' => 'int',
		'date_appointment' => 'datetime',
		'status_id' => 'int'
	];

	protected $fillable = [
		'prospects_id',
		'location_appointment',
		'description_appointment',
		'hour_appointment',
		'date_appointment',
		'status_id'
	];

	public function ir_prospect()
	{
		return $this->belongsTo(IrProspect::class, 'prospects_id');
	}

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}

	public function ir_team_for_appointments()
	{
		return $this->hasMany(IrTeamForAppointment::class, 'appointment_id');
	}
}
