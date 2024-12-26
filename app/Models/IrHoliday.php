<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrHoliday
 * 
 * @property int $id
 * @property int $employees_id
 * @property Carbon $start_date_holiday
 * @property Carbon $end_date_holiday
 * @property string $type_leave
 * @property string $motif_holiday
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrEmployee $ir_employee
 * @property Statut $statut
 *
 * @package App\Models
 */
class IrHoliday extends Model
{
	protected $table = 'ir_holiday';

	protected $casts = [
		'employees_id' => 'int',
		'start_date_holiday' => 'datetime',
		'end_date_holiday' => 'datetime',
		'status_id' => 'int'
	];

	protected $fillable = [
		'employees_id',
		'start_date_holiday',
		'end_date_holiday',
		'type_leave',
		'motif_holiday',
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
}
