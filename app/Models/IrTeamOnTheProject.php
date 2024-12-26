<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrTeamOnTheProject
 * 
 * @property int $id
 * @property int $employee_id
 * @property int $project_manager_id
 * @property string $role_team_project
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrEmployee $ir_employee
 * @property IrProjectManager $ir_project_manager
 * @property Statut $statut
 * @property Collection|IrTasksOnTheProjet[] $ir_tasks_on_the_projets
 *
 * @package App\Models
 */
class IrTeamOnTheProject extends Model
{
	protected $table = 'ir_team_on_the_project';

	protected $casts = [
		'employee_id' => 'int',
		'project_manager_id' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'employee_id',
		'project_manager_id',
		'role_team_project',
		'status_id'
	];

	public function ir_employee()
	{
		return $this->belongsTo(IrEmployee::class, 'employee_id');
	}

	public function ir_project_manager()
	{
		return $this->belongsTo(IrProjectManager::class, 'project_manager_id');
	}

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}

	public function ir_tasks_on_the_projets()
	{
		return $this->hasMany(IrTasksOnTheProjet::class, 'team_on_the_project_id');
	}
}
