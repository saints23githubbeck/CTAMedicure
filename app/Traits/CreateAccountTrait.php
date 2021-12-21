<?php

namespace App\Traits;

use Inertia\Inertia;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

/**
 * CreateAccountTrait
 */
trait CreateAccountTrait
{

  public function createAdminUser($request)
  {
    $header = $request->header('step');
    switch ($header) {
      case 'detail':
        $request->validate([
          'companyName' => 'required|string',
          'companyEmail' => 'required|string|email:filter|unique:admins,email'
        ]);
        return Redirect::route('register')->with('stepCompleted', true);
      case 'finish':
        $request->validate([
          'username' => 'required|string|min:3,max:10|unique:admins,username',
          'password' => ['required', Password::min(8)->mixedCase()]
        ]);
        try {
          DB::transaction(function () use ($request) {
            $company = Company::create([
              'logo' => 'default.png',
              'name' => $request->companyName,
              'email' => $request->companyEmail,
            ]);
            $admin = Admin::create([
              'company_id' => $company->id,
              'username' => $request->username,
              'password' => Hash::make($request->password),
              'email' => $request->companyEmail,
            ]);
            Profile::create([
              'admin_id' => $admin->id,
            ]);
          });
          if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember ?? false)) {
            config(['fortify.guard' => 'admin']);
            return Redirect::route('dashboard');
          } else {
            return Redirect::route('register')->withErrors(['loginError' => 'Your credentials don not match our records.']);
          }
        } catch (\Throwable $th) {
          return Redirect::route('register')
            ->withErrors(['accountError' => "We couldn't create your account, please try again."]);
        }
    }
  }
}
