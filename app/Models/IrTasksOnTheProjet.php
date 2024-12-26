<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrTasksOnTheProjet
 * 
 * @property int $id
 * @property int $team_on_the_project_id
 * @property string $title_tasks
 * @property string|null $description_tasks
 * @property string|null $commentaire_tasks
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Statut $statut
 * @property IrTeamOnTheProject $ir_team_on_the_project
 *
 * @package App\Models
 */
class IrTasksOnTheProjet extends Model
{
	protected $table = 'ir_tasks_on_the_projet';

	protected $casts = [
		'team_on_the_project_id' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'team_on_the_project_id',
		'title_tasks',
		'description_tasks',
		'commentaire_tasks',
		'status_id'
	];

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}

	public function ir_team_on_the_project()
	{
		return $this->belongsTo(IrTeamOnTheProject::class, 'team_on_the_project_id');
	}
}
