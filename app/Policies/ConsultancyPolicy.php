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

    public function update(User $user)
    {


        return $user->relation_to_role->name == 'Administrator' || $user->relation_to_role->name == 'Doctor' ? Response::allow() : Response::deny('you are not own and this page is authorized !');

    }


    public function view(User $user)
    {


        return $user->relation_to_role->name == 'Administrator' || $user->relation_to_role->name == 'patients' ? Response::allow() : Response::deny('you are not own and this page is authorized !');

    }


}
