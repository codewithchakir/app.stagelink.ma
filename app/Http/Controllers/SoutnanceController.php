<?php

namespace App\Http\Controllers;

use App\Models\Soutnance;
use Illuminate\Http\Request;

class SoutnanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $soutnances = Soutnance::all();
        return view(view:'soutnances.index' ,data:compact(var_name:'soutnances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $soutnances = Soutnance::all();
        return view(view:'soutnances.create' ,data:compact(var_name:'soutnances'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $soutnance = new Soutnance();
        $soutnance->prof_id = $request->prof_id;
        $soutnance->student_id = $request->student_id;
        $soutnance->date_soutnance = $request->date_soutnance;
        $soutnance->save();
        return response("company added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Soutnance $soutnance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soutnance $soutnance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Soutnance $soutnance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soutnance $soutnance)
    {
        //
    }
}
