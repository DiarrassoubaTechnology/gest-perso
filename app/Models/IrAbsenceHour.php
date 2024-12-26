<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrAbsenceHour
 * 
 * @property int $id
 * @property int $employees_id
 * @property Carbon $start_date_absence_hours
 * @property Carbon $end_date_absence_hours
 * @property int $sum_day_absence_hours
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrEmployee $ir_employee
 * @property Statut $statut
 * @property Collection|IrJustificationForAbsence[] $ir_justification_for_absences
 *
 * @package App\Models
 */
class IrAbsenceHour extends Model
{
	protected $table = 'ir_absence_hours';

	protected $casts = [
		'employees_id' => 'int',
		'start_date_absence_hours' => 'datetime',
		'end_date_absence_hours' => 'datetime',
		'sum_day_absence_hours' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'employees_id',
		'start_date_absence_hours',
		'end_date_absence_hours',
		'sum_day_absence_hours',
		'status_id'
	];

	public function ir_employee()
	{
		return $this->belongsTo(IrEmployee::class, 'employees_id');
	}

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}

	public function ir_justification_for_absences()
	{
		return $this->hasMany(IrJustificationForAbsence::class, 'absence_id');
	}
}
