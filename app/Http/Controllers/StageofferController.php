<?php

namespace App\Http\Controllers;

use App\Models\Stageoffer;
use Illuminate\Http\Request;

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
        return view(view: 'stageoffer.create');
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
