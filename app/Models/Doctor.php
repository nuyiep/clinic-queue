<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
		'id', 'name', 'specialty', 'is_active',
	];

	public function queues(): HasMany
	{
		return $this->hasMany(Queue::class);
	}

	public function consultations(): HasMany
	{
		return $this->hasMany(Consultations::class);
	}
}
