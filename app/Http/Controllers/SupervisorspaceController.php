<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Stagereq;
use App\Models\Stageoffer;
use Illuminate\Http\Request;

class SupervisorspaceController extends Controller
{
    public function index()
    {

    }

    public function createstage($supervisorId ,$studentId)
    {
        return view('stage.create', compact('studentId', 'supervisorId'));
    }

    public function storestage(Request $request)
    {
        Stage::create([
            'supervisor_id'=> request('supervisor_id'),
            'student_id'=> request('student_id'),
            'start'=> request('start'),
            'end'=> request('end'),
        ]);
    }

    public function acceptstage(Request $request)
    {
        $req = Stagereq::where('id', $request->stagereq )->get()->first();

        $req->update([
            'confirmation'=>true
        ]);

        $offer = Stageoffer::where('id', $request->offerId)->get()->first();

        $offer->update([
            'is_available' => false
        ]);

        return redirect(route('create.stage', [ 'supervisorId' => $request->supervisorId, 'studentId' => $request->studentId]));
    }
}
