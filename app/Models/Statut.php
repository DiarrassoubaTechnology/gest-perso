<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Statut
 * 
 * @property int $id
 * @property string $lib_statut
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|IrAbsenceHour[] $ir_absence_hours
 * @property Collection|IrActivity[] $ir_activities
 * @property Collection|IrAppointment[] $ir_appointments
 * @property Collection|IrCustomer[] $ir_customers
 * @property Collection|IrEmployee[] $ir_employees
 * @property Collection|IrFunctionOccupied[] $ir_function_occupieds
 * @property Collection|IrHoliday[] $ir_holidays
 * @property Collection|IrJustificationForAbsence[] $ir_justification_for_absences
 * @property Collection|IrProjectManager[] $ir_project_managers
 * @property Collection|IrProjectType[] $ir_project_types
 * @property Collection|IrProject[] $ir_projects
 * @property Collection|IrServiceActivity[] $ir_service_activities
 * @property Collection|IrService[] $ir_services
 * @property Collection|IrTasksOnTheProjet[] $ir_tasks_on_the_projets
 * @property Collection|IrTeamForAppointment[] $ir_team_for_appointments
 * @property Collection|IrTeamOnTheProject[] $ir_team_on_the_projects
 *
 * @package App\Models
 */
class Statut extends Model
{
	protected $table = 'statut';

	protected $fillable = [
		'lib_statut'
	];

	public function ir_absence_hours()
	{
		return $this->hasMany(IrAbsenceHour::class, 'status_id');
	}

	public function ir_activities()
	{
		return $this->hasMany(IrActivity::class, 'status_id');
	}

	public function ir_appointments()
	{
		return $this->hasMany(IrAppointment::class, 'status_id');
	}

	public function ir_customers()
	{
		return $this->hasMany(IrCustomer::class, 'status_id');
	}

	public function ir_employees()
	{
		return $this->hasMany(IrEmployee::class, 'status_id');
	}

	public function ir_function_occupieds()
	{
		return $this->hasMany(IrFunctionOccupied::class, 'status_id');
	}

	public function ir_holidays()
	{
		return $this->hasMany(IrHoliday::class, 'status_id');
	}

	public function ir_justification_for_absences()
	{
		return $this->hasMany(IrJustificationForAbsence::class, 'status_id');
	}

	public function ir_project_managers()
	{
		return $this->hasMany(IrProjectManager::class, 'status_id');
	}

	public function ir_project_types()
	{
		return $this->hasMany(IrProjectType::class, 'status_id');
	}

	public function ir_projects()
	{
		return $this->hasMany(IrProject::class, 'status_id');
	}

	public function ir_service_activities()
	{
		return $this->hasMany(IrServiceActivity::class, 'status_id');
	}

	public function ir_services()
	{
		return $this->hasMany(IrService::class, 'status_id');
	}

	public function ir_tasks_on_the_projets()
	{
		return $this->hasMany(IrTasksOnTheProjet::class, 'status_id');
	}

	public function ir_team_for_appointments()
	{
		return $this->hasMany(IrTeamForAppointment::class, 'status_id');
	}

	public function ir_team_on_the_projects()
	{
		return $this->hasMany(IrTeamOnTheProject::class, 'status_id');
	}
}
