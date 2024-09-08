<?php

namespace App\Http\Controllers;

use App\Models\Stageoffer;
use App\Models\Stagereq;
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
        $offers = Stageoffer::with(['supervisor.user', 'supervisor.company', ])->get();
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

        $offer = Stageoffer::where('supervisor_id', $supervisorId)->get()->first();
        if($offer)
            $reqs = Stagereq::where('offer_id', $offer->id)->get();
        else
            $reqs = false;

        return view('stageoffer.create', compact('supervisorId', 'offer', 'reqs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Stageoffer::create([
            'supervisor_id'=> request('supervisor_id'),
            'title'=> request('title'),
            'body'=> request('body')
        ]);
        return redirect(route('stageoffer.create'));
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
    public function destroy($id)
    {
        $offer = Stageoffer::where('id', $id)->get()->first();
        $offer->delete();

        return redirect(route('stageoffer.create'));
    }
}
