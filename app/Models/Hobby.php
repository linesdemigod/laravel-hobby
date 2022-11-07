<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
	use HasFactory;

	//for input
	protected $fillable = [
		'name',
		'age',
		'hobby',
		'user_id',
	];

	public function scopeFilter($query, array $filters)
	{

		if ($filters['search'] ?? false) {
			$query->where('hobby', 'like', '%' . request('search') . '%')
				->orWhere('age', 'like', '%' . request('search') . '%');
		}
	}

	//define the table  incase you want to specify table
	// protected $table = 'table name';

	//define your own primary key
	//protected $primaryKey = 'no of the column';

	//set timestamp to false (default value is true)
	//protected $timestamps = false;

	//the hobby - to get the person who posted name
	public function User()
	{
		return $this->belongsTo(User::class);
	}
}
