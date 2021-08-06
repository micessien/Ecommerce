<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\User;
use App\Models\Role;
use Session;

class RegisterUserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Custom Register User Controller
    |--------------------------------------------------------------------------
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration user.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /*
    * GET
    */
    public function registrationForm()
    {
        // create variables role, regions, departements and localite
        // $roles = Role::where('name', '!=', 'admin')->get();
        $roles = Role::all();
        // dd($roles);

        return view('admin.users.custom.register')->withRoles($roles);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registerUser(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        // Create user account
        $data = $request->all();
        $user = $this->create($data);

        // Add role user by default from the register page
        $user->roles()->attach($request->role);

        // Set flash data with success message
        Session::flash('success', "Génial! Vous avez créé un utilisateur avec succès.");
        // redirect with flash data to admin.users.index
        return redirect()->route('admin.users.index');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'firstname' => $data['firstname'],
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'user_id' => auth()->user()->id
      ]);
    }

}
