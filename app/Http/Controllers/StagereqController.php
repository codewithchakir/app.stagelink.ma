<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Stageoffer;
use App\Models\Stagereq;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StagereqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        
        $student = Student::whereHas('user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->first();
        
        $studentId = $student->id;
        
        Stagereq::create([
            'student_id'=> $studentId,
            'offer_id'=> request('offer_id'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Stagereq $stagereq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stagereq $stagereq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stagereq $stagereq)
    {
        // dd($stagereq);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stagereq $stagereq)
    {
        //
    }

    public function downloadCV($studentId)
{
    $student = Student::findOrFail($studentId);

    $fileData = $student->cv; // Retrieve the CV file from the 'cv' column

    // Set the appropriate headers for the response
    $headers = [
        'Content-Type' => 'application/pdf', // Adjust the content type based on your file type
        'Content-Disposition' => 'attachment; filename="cv.pdf"', // Adjust the filename and extension accordingly
    ];

    // Return the file as a downloadable response
    return response($fileData, 200, $headers);
}
}
