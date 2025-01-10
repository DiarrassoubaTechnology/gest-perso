<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrTimeWork
 * 
 * @property int $id
 * @property Carbon $day_of_date
 * @property int $employe_id
 * @property Carbon $start_time
 * @property Carbon|null $end_time
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrEmployee $ir_employee
 * @property Statut $statut
 *
 * @package App\Models
 */
class IrTimeWork extends Model
{
	protected $table = 'ir_time_work';

	protected $casts = [
		'day_of_date' => 'datetime',
		'employe_id' => 'int',
		'start_time' => 'datetime',
		'end_time' => 'datetime',
		'status_id' => 'int'
	];

	protected $fillable = [
		'day_of_date',
		'employe_id',
		'start_time',
		'end_time',
		'status_id'
	];

	public function ir_employee()
	{
		return $this->belongsTo(IrEmployee::class, 'employe_id');
	}

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}
}
