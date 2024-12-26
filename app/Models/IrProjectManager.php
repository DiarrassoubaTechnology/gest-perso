<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrProjectManager
 * 
 * @property int $id
 * @property int $employee_id
 * @property int $project_id
 * @property int $project_types_id
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrEmployee $ir_employee
 * @property IrProject $ir_project
 * @property IrProjectType $ir_project_type
 * @property Statut $statut
 * @property Collection|IrTeamOnTheProject[] $ir_team_on_the_projects
 *
 * @package App\Models
 */
class IrProjectManager extends Model
{
	protected $table = 'ir_project_manager';

	protected $casts = [
		'employee_id' => 'int',
		'project_id' => 'int',
		'project_types_id' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'employee_id',
		'project_id',
		'project_types_id',
		'status_id'
	];

	public function ir_employee()
	{
		return $this->belongsTo(IrEmployee::class, 'employee_id');
	}

	public function ir_project()
	{
		return $this->belongsTo(IrProject::class, 'project_id');
	}

	public function ir_project_type()
	{
		return $this->belongsTo(IrProjectType::class, 'project_types_id');
	}

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}

	public function ir_team_on_the_projects()
	{
		return $this->hasMany(IrTeamOnTheProject::class, 'project_manager_id');
	}
}
