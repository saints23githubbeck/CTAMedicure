<?php

namespace App\Traits;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Profile;
use App\Models\TeamUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

/**
 * AdminTrait
 */
trait AdminTrait
{
  public function getProfile()
  {
    return User::where('users.id', Auth::id())
      ->join('profiles', 'profiles.user_id', '=', 'users.id')
      ->select('users.*', 'profiles.avatar', 'profiles.first_name', 'profiles.last_name')
      ->first();
  }
  public function getPeople()
  {
    return User::join('profiles', 'profiles.user_id', '=', 'users.id')
      ->select('users.*', 'profiles.avatar', 'profiles.first_name', 'profiles.last_name')
      ->orderByDesc('created_at')
      ->get();
  }
  public function myTeams($id = null)
  {
    if ($id) {
      return User::with('teams')->find($id);
    }
    return User::with(['teams' => function ($query) {
      $query->select('teams.id', 'teams.name', 'teams.description', 'teams.created_at');
    }])
      ->select('users.id')
      ->find(Auth::id());
  }
  public function getTeams($id = null)
  {
    if ($id) {
      return Team::find($id);
    }
    return Team::where('company_id', Auth::user()->company_id)->orderByDesc('created_at')->get();
  }
  public function getCompany($id = null)
  {
    if ($id) {
      return Company::where('id', $id)->first();
    }
    return Company::where('id', Auth::user()->company_id)->first();
  }

  public function createTeam($request)
  {
    $request->validate([
      'name' => 'required|string',
      'description' => 'nullable|string',
    ]);
    $team = Team::create([
      'user_id' => Auth::id(),
      'company_id' => Auth::user()->company_id,
      'name' => $request->name,
      'description' => $request->description,
    ]);
    return response()->json(['created' => true, 'team' => $this->getTeams($team->id)]);
  }
  public function roles()
  {
   $roles = Role::orderBy('name','ASC')->get();

   return view('admin.pages.user', compact($roles));

  }
  public function createAssignTeams($request)
  {
    $request->validate([
      'teams' => 'required',
    ]);
    foreach ($request->teams as  $team) {
      foreach ($request->users as $user) {
        TeamUser::firstOrCreate(
          [
            'user_id' => $user,
            'team_id' => $team,
          ]
        );
      }
    }
    return redirect(route('people'));
  }

  public function updateTeam($request, $team)
  {
    $request->validate([
      'name' => 'required|string',
      'description' => 'nullable|string',
    ]);
 if (Auth::user()->can('administratorActions', Team::class)){
     $team->name = $request->name;
     $team->description = $request->description;
     $team->save();
     return response()->json(['updated' => true, 'team' => $this->getTeams($team->id)]);
 }


  }
  public function saveInvite($request)
  {
    $request->validate([
      'username' => 'required|string',
      'email' => 'required|string|email|unique:users,email',
      'password' => 'required',
    ]);
    $user = User::create([
      'company_id' => User::find($request->admin)->company_id,
      'username' => $request->username,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);
    Profile::create(['user_id' => $user->id]);
    return Redirect::route('login');
  }
}
