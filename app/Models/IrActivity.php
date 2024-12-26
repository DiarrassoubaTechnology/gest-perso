<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrActivity
 * 
 * @property int $id
 * @property string $lib_statut
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Statut $statut
 * @property Collection|IrProspect[] $ir_prospects
 *
 * @package App\Models
 */
class IrActivity extends Model
{
	protected $table = 'ir_activity';

	protected $casts = [
		'status_id' => 'int'
	];

	protected $fillable = [
		'lib_statut',
		'status_id'
	];

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}

	public function ir_prospects()
	{
		return $this->hasMany(IrProspect::class, 'field_of_activities');
	}
}
