<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use App\Models\Consultancy;
use App\Models\Role;
class ConsultancyPolicy
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

public function update(User $user){
    
// echo   $role->find($user->find($consultancy->user_id)->role_id)->name;


//   $role->find($user->find($consultancy->user_id)->role_id)->name == 'patients' ? Response::allow() : Response::deny('you can not get this page !');

// return $user->role_id === $role->id;
// return $user->id == 3 ? Response::allow() : Response::deny('what');

return $user->relation_to_role->name == 'patients' || $user->relation_to_role->name == 'Administrator' ? Response::allow() : Response::deny('you are not own and this page is authorized !');

}


}
