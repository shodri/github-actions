<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreDeveloperRequest;
use App\Http\Requests\UpdateDeveloperRequest;
use Illuminate\Support\Facades\Redirect;

class DeveloperController extends Controller
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
        return view('developer.edit',[
            'developer' => new Developer,
            'countries' => Country::orderBy('name', 'ASC')->get(),
            'calling_codes' => Country::orderBy('calling_code', 'ASC')->distinct('calling_code')->pluck('calling_code'),   
            'specialities' => array('Residencial', 'Comercial', 'Industrial'),     
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeveloperRequest $request): RedirectResponse
    {
        //dd($request);
        $validated = $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'email' => 'email',
            'phonecode' => 'required_with:phonenum',
            'phonenum' => 'numeric|digits_between:6,15',
            'whappcode' => 'required_with:whappnum',
            'whappnum' => 'nullable|numeric|digits_between:6,15',
            'url' => 'nullable|url:http,https',
            'short_description' => 'max:255',
            'picture' => 'image|mimes:jpg,jpeg,png,gif,bmp,svg|max:2048',
        ]);

        $data = $validated;
        $data['phone']    = $request->phonenum ? '+' . $request->phonecode . ' ' . preg_replace('/[^0-9]/', '', $request->phonenum) : null;
        $data['whatsapp'] = $request->whappnum ? '+' . $request->whappcode . ' ' . preg_replace('/[^0-9]/', '', $request->whappnum) : null;

        //dd($data);
        $developer = Developer::create($data);
        $request->user()->developers()->attach($developer->id, ['function'=>'owner']);

        return Redirect::route('profile.edit')->with('status', 'developer-stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer)
    {
        if(!$developer) {
            $developer = new Developer;
        }

        return view('developer.edit',[
            'developer' => $developer,
            'countries' => Country::orderBy('name', 'ASC')->get(),
            'calling_codes' => Country::orderBy('calling_code', 'ASC')->distinct('calling_code')->pluck('calling_code'),   
            'specialities' => array('Residencial', 'Comercial', 'Industrial'),     
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeveloperRequest $request, Developer $developer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        //
    }
}
