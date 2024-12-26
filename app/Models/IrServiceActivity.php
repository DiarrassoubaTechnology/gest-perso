<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrServiceActivity
 * 
 * @property int $id
 * @property string $title_service_activity
 * @property string $description_service_activity
 * @property int $service_id
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrService $ir_service
 * @property Statut $statut
 *
 * @package App\Models
 */
class IrServiceActivity extends Model
{
	protected $table = 'ir_service_activity';

	protected $casts = [
		'service_id' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'title_service_activity',
		'description_service_activity',
		'service_id',
		'status_id'
	];

	public function ir_service()
	{
		return $this->belongsTo(IrService::class, 'service_id');
	}

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}
}
