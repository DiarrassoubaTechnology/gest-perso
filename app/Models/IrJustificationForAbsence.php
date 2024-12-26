<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrJustificationForAbsence
 * 
 * @property int $id
 * @property int $absence_id
 * @property string|null $description_justification
 * @property string $file_justification
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrAbsenceHour $ir_absence_hour
 * @property Statut $statut
 *
 * @package App\Models
 */
class IrJustificationForAbsence extends Model
{
	protected $table = 'ir_justification_for_absences';

	protected $casts = [
		'absence_id' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'absence_id',
		'description_justification',
		'file_justification',
		'status_id'
	];

	public function ir_absence_hour()
	{
		return $this->belongsTo(IrAbsenceHour::class, 'absence_id');
	}

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}
}
