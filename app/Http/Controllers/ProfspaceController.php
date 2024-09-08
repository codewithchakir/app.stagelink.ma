<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use App\Models\User;
use App\Models\Student;
use App\Models\Soutnance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfspaceController extends Controller
{
    public function index()
    {
        // $userId = Auth::id();
        $user = Auth::user();
        $userId = $user->id;
        // $userName = $user->name;
        $prof = Prof::whereHas('user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->first();
        
        $group = $prof->group;

        // Count of students with the same group
        $studentCount = Student::where('group', $group)->count();

        // Count of soutnances associated with the professor's ID
        $soutnanceCount = Soutnance::where('prof_id', $prof->id)->count();

    return view('prof.dashboard', compact('group', 'studentCount', 'soutnanceCount'));

    }
    
    public function students()
    {
        $user = Auth::user();
        $userId = $user->id;
        $prof = Prof::whereHas('user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->first();

        $group = $prof->group;

        $users = User::whereIn('id', function ($query) use ($group) {
            $query->select('user_id')
                ->from((new Student)->getTable())
                ->where('group', $group);
        })->get();

        return view('prof.students', compact('users', 'group'));
    }

    public function soutnances()
    {
        $user = Auth::user();
        $userId = $user->id;
        $prof = Prof::whereHas('user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->first();

        $profId = $prof->id;

        $soutnances = Soutnance::where('prof_id', $profId)->get();

        

        return view('prof.soutnances', compact('soutnances', 'profId'));
    }
}
