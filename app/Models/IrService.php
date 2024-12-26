<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrService
 * 
 * @property int $id
 * @property string $libelle_service
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Statut $statut
 * @property Collection|IrEmployee[] $ir_employees
 * @property Collection|IrServiceActivity[] $ir_service_activities
 *
 * @package App\Models
 */
class IrService extends Model
{
	protected $table = 'ir_services';

	protected $casts = [
		'status_id' => 'int'
	];

	protected $fillable = [
		'libelle_service',
		'status_id'
	];

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}

	public function ir_employees()
	{
		return $this->hasMany(IrEmployee::class, 'service_id');
	}

	public function ir_service_activities()
	{
		return $this->hasMany(IrServiceActivity::class, 'service_id');
	}
}
