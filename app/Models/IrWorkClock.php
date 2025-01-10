<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrWorkClock
 * 
 * @property int $id
 * @property Carbon $start_work_clock
 * @property Carbon $end_work_clock
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Statut $statut
 *
 * @package App\Models
 */
class IrWorkClock extends Model
{
	protected $table = 'ir_work_clock';

	protected $casts = [
		'start_work_clock' => 'datetime',
		'end_work_clock' => 'datetime',
		'status_id' => 'int'
	];

	protected $fillable = [
		'start_work_clock',
		'end_work_clock',
		'status_id'
	];

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}
}
