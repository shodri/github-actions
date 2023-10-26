<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Models\Country;
use App\Models\Document;
use App\Models\Dclass;
use App\Http\Requests\DeveloperRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.developer.index')->with([
            'developers'=>Developer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.developer.edit')->with([
            'title' => 'Nueva desarrolladora',
            'action' => route('admin.developers.store'),
            'developer' => new Developer,
            'countries' => Country::orderBy('name', 'ASC')->get(),
            'develop_classes' => DevelopClass::all(),     
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeveloperRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if(!isset($data['speciality'])) $data['speciality'] = [];
        $developer = Developer::create($data);
        $this->brochureUpload($request, $developer);

        return redirect(route('admin.developers.edit', $developer->id))->withSuccess('El registro fue creado exitosamente!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer): View
    {
        $developer->brochure = $developer->documents()
                                         ->where(['type'=>'brochure','status'=>'enabled'])
                                         ->first();

        $developer->picture = $developer->documents()
                                         ->where(['type'=>'picture','status'=>'enabled'])
                                         ->first();

        return view('admin.developer.edit')->with([
            'title' => 'Editar desarrolladora',
            'action' => route('admin.developers.update', ['developer' => $developer->id]),
            'developer' => $developer,
            'countries' => Country::orderBy('name', 'ASC')->get(),
            'develop_classes' => Dclass::all(),     
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeveloperRequest $request, Developer $developer): RedirectResponse
    {
        $data = $request->validated();

        if(!isset($data['speciality'])) $data['speciality'] = [];

        //dd($request);
        if($request->picture) {
            if(preg_match('/([^,\/:;]*)(:([^,\/;]*))?(\/([^,;]*))?(;([^,]*))?(,(.*))?/', $request->picture, $image_parts)){
                //dd($image_parts);
                switch($image_parts[1]) {
                case "delete":
                    $data['image'] = null;
                    if($image_parts[9] != '' && Storage::exists($image_parts[9])) {
                        Storage::delete($image_parts[9]);
                    }
                    break;
                case "data":
                    if($image_parts[3] == "image") {
                        $content = $image_parts[9];
                        if($image_parts[7] == "base64") $content = base64_decode($content);
                        $path=sprintf("public/documents/developers/%d/%s.%s", $developer->id,'picture', $image_parts[5]);
                        //dd($path);
                        if($request->picture_old && $request->picture_old != $path && Storage::exists($request->picture_old)) {
                             Storage::delete($request->picture_old);
                        }
                        if(!Storage::put($path, $content)) {
                            return back()->withErrors('No fue posible actualizar el logo');
                        }
                        $data['image'] = $path; 
                    }
                    break;
                }

            }
        }

        $developer->update($data);
        $this->brochureUpload($request, $developer);

        return redirect()->back()->withSuccess('La información fue guardada exitosamente!');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer): RedirectResponse
    {
        $developer->delete();
        return back()->withInput();
    }

    public function brochureDelete(Developer $developer): RedirectResponse
    {
        $brochure = $developer->documents()
                              ->where(['type'=>'brochure','status'=>'enabled'])
                              ->first();
        if($brochure) {
            $brochure->delete();
        }

        return back()->withInput();
    }


    private function brochureUpload(DeveloperRequest $request, Developer $developer)
    {
        if($request->file('brochure') && $request->file('brochure')->isValid()) {
            $filename=sprintf("%s.%s", date('YmdHis'),$request->brochure->extension());
            $path = $request->brochure->storeAs('public/documents/developers/'.$developer->id, $filename);
            $developer->documents()->create([
                'name' => 'brochure',
                'type' => 'brochure',
                'class' => 'document',
                'mode' => 'internal',
                'mime' => $request->brochure->extension(),
                'path' => $path,
                'status' => 'enabled'
            ]);
        }
    }

}
