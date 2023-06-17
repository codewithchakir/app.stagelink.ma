<?php

namespace App\Http\Controllers\Auth;

use App\Models\Prof;
use App\Models\User;
use App\Models\Student;
use Illuminate\View\View;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'type' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Store the user information
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => Hash::make($request->password),
        ]);

// dd($request->all());

        // Retrieve the user ID
        $userId = $user->id;
        // Store additional inputs based on the user type
        $type = $request->type;
        
        if ($type === "student") {
            // Store additional inputs for student
            Student::create([
                'user_id' => $userId,
                'group' => $request->group,
                'cv' => $request->cv,
            ]);
            // Handle CV file upload if needed
            // if ($request->hasFile('cv')) {
                //     $cvPath = $request->file('cv')->store('cv');
                //     // Store the CV file path in the database or handle as needed
                // }
                
        } elseif ($type === "prof") {
                // Store additional inputs for professor
            Prof::create([
                'user_id' => $userId,
                'group' => $request->group,
            ]);
        } elseif ($type === "supervisor") {
            // Store additional inputs for supervisor
            Supervisor::create([
                'user_id' => $userId,
                'company_id' => $request->company_id,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        if ($type === "student") {
            return redirect(RouteServiceProvider::STUDENT);            
        } elseif ($type === "prof") {
            return redirect(RouteServiceProvider::PROF);
        } elseif ($type === "supervisor") {
            return redirect(RouteServiceProvider::SUPERVISOR);
        }
        return redirect(RouteServiceProvider::ADMIN);
    }
}
