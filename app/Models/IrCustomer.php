<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IrCustomer
 * 
 * @property int $id
 * @property int $prospects_id
 * @property string $customer_name_manager
 * @property string $customer_tel_manager
 * @property string|null $customer_email_manager
 * @property int $status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property IrProspect $ir_prospect
 * @property Statut $statut
 *
 * @package App\Models
 */
class IrCustomer extends Model
{
	protected $table = 'ir_customer';

	protected $casts = [
		'prospects_id' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'prospects_id',
		'customer_name_manager',
		'customer_tel_manager',
		'customer_email_manager',
		'status_id'
	];

	public function ir_prospect()
	{
		return $this->belongsTo(IrProspect::class, 'prospects_id');
	}

	public function statut()
	{
		return $this->belongsTo(Statut::class, 'status_id');
	}
}
