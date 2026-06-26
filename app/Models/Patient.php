<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    protected $fillable = [
		'name', 'ic_number', 'phone', 'date_of_birth', 'gender',	
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
