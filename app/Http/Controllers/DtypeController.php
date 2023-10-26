<?php

namespace App\Http\Controllers;

use App\Models\Dtype;
use App\Http\Requests\StoreDtypeRequest;
use App\Http\Requests\UpdateDtypeRequest;
use Illuminate\Http\Request;

class DtypeController extends Controller
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
    public function store(StoreDtypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dtype $dtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dtype $dtype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDtypeRequest $request, Dtype $dtype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dtype $dtype)
    {
        //
    }

    /**
     * Retrive the list of types o e Develop class in json format.
     */
    public function json($class_id)
    {
        return Dtype::select('id', 'name')
                          ->where('dclass_id', $class_id)
                          ->orderBy('name','asc')
                          ->get();
    }
}
