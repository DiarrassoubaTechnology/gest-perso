<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrEmployee
 * 
 * @property int $id
 * @property string $code_employee
 * @property string $lastname_employee
 * @property string $firstname_employee
 * @property string $tel_employee
 * @property int $service_id
 * @property int $fonction_employee
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrFunctionOccupied $ir_function_occupied
 * @property IrService $ir_service
 * @property Statut $statut
 * @property Collection|IrAbsenceHour[] $ir_absence_hours
 * @property Collection|IrHistoryConnection[] $ir_history_connections
 * @property Collection|IrHoliday[] $ir_holidays
 * @property Collection|IrProjectManager[] $ir_project_managers
 * @property Collection|IrProject[] $ir_projects
 * @property Collection|IrTeamForAppointment[] $ir_team_for_appointments
 * @property Collection|IrTeamOnTheProject[] $ir_team_on_the_projects
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class IrEmployee extends Model
{
	protected $table = 'ir_employees';

	protected $casts = [
		'service_id' => 'int',
		'fonction_employee' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'code_employee',
		'lastname_employee',
		'firstname_employee',
		'tel_employee',
		'service_id',
		'fonction_employee',
		'date_of_birth',
		'place_of_birth',
		'status_id'
	];

	public function ir_function_occupied()
	{
		return $this->belongsTo(IrFunctionOccupied::class, 'fonction_employee');
	}

	public function ir_service()
	{
		return $this->belongsTo(IrService::class, 'service_id');
	}

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}

	public function ir_absence_hours()
	{
		return $this->hasMany(IrAbsenceHour::class, 'employees_id');
	}

	public function ir_history_connections()
	{
		return $this->hasMany(IrHistoryConnection::class, 'employees_id');
	}

	public function ir_holidays()
	{
		return $this->hasMany(IrHoliday::class, 'employees_id');
	}

	public function ir_project_managers()
	{
		return $this->hasMany(IrProjectManager::class, 'employee_id');
	}

	public function ir_projects()
	{
		return $this->hasMany(IrProject::class, 'employe_id');
	}

	public function ir_team_for_appointments()
	{
		return $this->hasMany(IrTeamForAppointment::class, 'employees_id');
	}

	public function ir_team_on_the_projects()
	{
		return $this->hasMany(IrTeamOnTheProject::class, 'employee_id');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'employees_id');
	}
}
