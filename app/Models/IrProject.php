<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrProject
 * 
 * @property int $id
 * @property string $code_project
 * @property string $libelle_project
 * @property string $description_project
 * @property int $employe_id
 * @property Carbon $start_date_project
 * @property Carbon|null $delivery_date_project
 * @property int $fonction_employee
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrEmployee $ir_employee
 * @property IrFunctionOccupied $ir_function_occupied
 * @property Statut $statut
 * @property Collection|IrFilesProject[] $ir_files_projects
 * @property Collection|IrProjectManager[] $ir_project_managers
 *
 * @package App\Models
 */
class IrProject extends Model
{
	protected $table = 'ir_projects';

	protected $casts = [
		'employe_id' => 'int',
		'start_date_project' => 'datetime',
		'delivery_date_project' => 'datetime',
		'fonction_employee' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'code_project',
		'libelle_project',
		'description_project',
		'employe_id',
		'start_date_project',
		'delivery_date_project',
		'fonction_employee',
		'status_id'
	];

	public function ir_employee()
	{
		return $this->belongsTo(IrEmployee::class, 'employe_id');
	}

	public function ir_function_occupied()
	{
		return $this->belongsTo(IrFunctionOccupied::class, 'fonction_employee');
	}

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}

	public function ir_files_projects()
	{
		return $this->hasMany(IrFilesProject::class, 'project_id');
	}

	public function ir_project_managers()
	{
		return $this->hasMany(IrProjectManager::class, 'project_id');
	}
}
