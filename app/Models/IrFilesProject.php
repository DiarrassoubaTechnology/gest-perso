<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrFilesProject
 * 
 * @property int $id
 * @property string $files_project
 * @property int $project_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrProject $ir_project
 *
 * @package App\Models
 */
class IrFilesProject extends Model
{
	protected $table = 'ir_files_project';

	protected $casts = [
		'project_id' => 'int'
	];

	protected $fillable = [
		'files_project',
		'project_id'
	];

	public function ir_project()
	{
		return $this->belongsTo(IrProject::class, 'project_id');
	}
}
