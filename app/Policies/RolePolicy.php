<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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
    
    public function isAdmin(User $user){
  return  $user->relation_to_role->name == 'Administrator';
    }
  public function isAdmin_Pharmacy_Delivary(User $user){
      return  $user->relation_to_role->name == 'Administrator' || $user->relation_to_role->name == 'Delivery' || $user->relation_to_role->name == 'Pharmacy';
  }
  public function isAdmin_Doctor(User $user){
    return  $user->relation_to_role->name == 'Administrator' || $user->relation_to_role->name == 'Doctor';
}
public function isAdmin_Pharmacy(User $user){
  return  $user->relation_to_role->name == 'Administrator' || $user->relation_to_role->name == 'Pharmacy';
}

}
