<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrFunctionOccupied
 * 
 * @property int $id
 * @property string $lib_function_occupied
 * @property int $service_id
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|IrEmployee[] $ir_employees
 * @property Collection|IrProject[] $ir_projects
 *
 * @package App\Models
 */
class IrFunctionOccupied extends Model
{
	protected $table = 'ir_function_occupied';

	protected $casts = [
		'service_id' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'lib_function_occupied',
		'service_id',
		'status_id'
	];

	public function ir_employees()
	{
		return $this->hasMany(IrEmployee::class, 'fonction_employee');
	}

	public function ir_projects()
	{
		return $this->hasMany(IrProject::class, 'fonction_employee');
	}
}
