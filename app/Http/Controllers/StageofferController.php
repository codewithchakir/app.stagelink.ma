<?php

namespace App\Http\Controllers;

use App\Models\Stageoffer;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StageofferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Stageoffer::all();
        return view(view:'stageoffer.index' ,data:compact(var_name:'offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $userId = $user->id;
        
        $supervisor = Supervisor::whereHas('user', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->first();
        
        $supervisorId = $supervisor->id;
        // dd($supervisorId);

        

        return view('stageoffer.create', compact('supervisorId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Stageoffer $stageoffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stageoffer $stageoffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stageoffer $stageoffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stageoffer $stageoffer)
    {
        //
    }
}
