<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use App\Models\User;
use App\Models\Company;
use App\Models\Student;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminspaceController extends Controller
{
    public function index()
    {
        // Get the count of companies
        $companyCount = Company::count();

        // Get the count of students
        $studentCount = Student::count();

        // Get the count of supervisors
        $supervisorCount = Supervisor::count();

        // Get the count of professors
        $professorCount = Prof::count();

        // Pass the counts to the view
        return view('admin.dashboard', compact('companyCount', 'studentCount', 'supervisorCount', 'professorCount'));
    }

    public function users()
    {
        $users = User::all();
        
        return view('admin.users', compact('users'));
    }

    public function admin()
    {
        $admins = User::where('type', 'admin')->get();
        return view('admin.new', compact('admins'));
    }

    public function adminstore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'type' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // Store the user information
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('admin.new'));
    }

}
