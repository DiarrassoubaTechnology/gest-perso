<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrProjectType
 * 
 * @property int $id
 * @property string $libelle_project_types
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Statut $statut
 * @property Collection|IrProjectManager[] $ir_project_managers
 *
 * @package App\Models
 */
class IrProjectType extends Model
{
	protected $table = 'ir_project_types';

	protected $casts = [
		'status_id' => 'int'
	];

	protected $fillable = [
		'libelle_project_types',
		'status_id'
	];

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}

	public function ir_project_managers()
	{
		return $this->hasMany(IrProjectManager::class, 'project_types_id');
	}
}
