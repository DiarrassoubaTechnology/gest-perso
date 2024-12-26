<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrProspect
 * 
 * @property int $id
 * @property string $name_of_structure
 * @property string $prospects_location
 * @property string $prospects_tel
 * @property string|null $prospects_email
 * @property int $field_of_activities
 * @property string $statut
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrActivity $ir_activity
 * @property Collection|IrAppointment[] $ir_appointments
 * @property Collection|IrCustomer[] $ir_customers
 *
 * @package App\Models
 */
class IrProspect extends Model
{
	protected $table = 'ir_prospects';

	protected $casts = [
		'field_of_activities' => 'int'
	];

	protected $fillable = [
		'name_of_structure',
		'prospects_location',
		'prospects_tel',
		'prospects_email',
		'field_of_activities',
		'statut'
	];

	public function ir_activity()
	{
		return $this->belongsTo(IrActivity::class, 'field_of_activities');
	}

	public function ir_appointments()
	{
		return $this->hasMany(IrAppointment::class, 'prospects_id');
	}

	public function ir_customers()
	{
		return $this->hasMany(IrCustomer::class, 'prospects_id');
	}
}
