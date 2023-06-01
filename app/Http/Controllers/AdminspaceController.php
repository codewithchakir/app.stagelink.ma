<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use App\Models\User;
use App\Models\Company;
use App\Models\Student;
use App\Models\Supervisor;
use Illuminate\Http\Request;

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
        return view('admin.new');
    }

    public function adminstore()
    {
        //
    }

}
