<?php

namespace App\Policies;

use App\Models\Hobby;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HobbyPolicy
{
	use HandlesAuthorization;

	/**
	 * Create a new policy instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	public function edit(User $user, Hobby $hobby)
	{
		return $user->id === $hobby->user_id;
	}

	public function delete(User $user, Hobby $hobby)
	{
		return $user->id === $hobby->user_id;
	}
}
