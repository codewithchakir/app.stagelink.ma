<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view(view:'companies.index' ,data:compact(var_name:'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(view: 'companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->address = $request->address;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->ICE = $request->ICE;
        $company->save();
        return response("company added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $company = Company::findorFail($id);
        return view(view:'companies.show', data:compact(var_name:'company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = Company::findorFail($id);
        return view(view:'companies.edit', data:compact(var_name:'company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $company = Company::findorFail($id);
        $company->name = $request->name;
        $company->address = $request->address;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->ICE = $request->ICE;
        $company->save();
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Company::findorFail($id)->delete();
        return redirect()->route('companies.index');
    }
}
