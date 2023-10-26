<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Develop;
use App\Models\Amenitie;
use App\Models\Country;
use App\Models\Document;
use App\Models\Dclass;
use App\Models\Dtype;
use App\Http\Requests\DevelopRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DevelopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.develop.index')->with([
            'develops'=>Develop::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    //public function create(Request $request)
    public function create(Dtype $dtype)
    {
        if(is_null($dtype->id)) {
            return view('admin.develop.new')->with([
                'develop_classes' => Dclass::all(),     
            ]);
        } else {
            return view('admin.develop.edit')->with([
                'title' => 'Nuevo desarrollo',
                'action' => route('admin.develops.store'),
                'develop' => new Develop(['dtype_id' => $dtype->id]),
                'countries' => Country::orderBy('name', 'ASC')->get(),
                'amenities' => Amenitie::all(),
            ]);
        }
    }

    /**
     * setType a newly created resource in storage.
     */
    public function setType(Request $request)
    {
        $validated = $request->validate([
            'dtype' => 'required',
        ]);

        return redirect(route('admin.develops.createWithType', $validated['dtype']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DevelopRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $develop = Develop::create($data);

        return redirect(route('admin.develops.edit', $develop->id))->withSuccess('El registro fue creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Develop $develop): View
    {
        return view('admin.develop.edit')->with([
            'title' => 'Editar desarrollo',
            'action' => route('admin.develops.update', ['develop' => $develop->id]),
            'develop' => $develop,
            'countries' => Country::orderBy('name', 'ASC')->get(),
            'amenities' => Amenitie::all(),
            'develop_classes' => Dclass::all(),     
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DevelopRequest $request, Develop $develop): RedirectResponse
    {
        $data = $request->validated();
        $develop->update($data);

        //dd($request->document);
        foreach($request->document as $key => $file) {
            if(preg_match('/^(.*)_(.*)_(.*)_(.*)$/', $key, $key_parts)) {
                if(preg_match('/([^,\/:;]*)(:([^,\/;]*))?(\/([^,;]*))?(;([^,]*))?(,(.*))?/', $file, $image_parts)){

                    switch($image_parts[1]) {
                    case 'delete':
                    case 'data':

                        if($key_parts[3] == 'upd') {
                            $document = $develop->documents()->find($key_parts[4]);
                            if(!is_null($document)) {
                                if($document->path != '' && $document->mode == 'internal' && Storage::exists($document->path)) {
                                    Storage::delete($document->path);
                                }
                                $document->delete();
                            }
                        }

                        if($image_parts[3] == "image") {
                            $content = $image_parts[9];
                            if($image_parts[7] == "base64") $content = base64_decode($content);
                            $path=sprintf("public/documents/develops/%d/%s%d.%s", $develop->id, Str::random(30), time(), $image_parts[5]);
                            if(!Storage::put($path, $content)) {
                                return back()->withErrors('No fue posible actualizar el logo');
                            }
                            $document = new Document(['name'=>$key_parts[2],
                                                      'type'=>$key_parts[1],
                                                      'subtype'=>$key_parts[2],
                                                      'order'=>1,
                                                      'class'=>'image',
                                                      'mode'=>'internal',
                                                      'path'=>$path,
                                                      'status'=>'enabled']); 
                            $develop->documents()->save($document);
                        }
    

                    }
                }
            }

        }

        return redirect()->back()->withSuccess('La información fue guardada exitosamente!');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Develop $develop): RedirectResponse
    {
        $develop->delete();
        return back()->withInput();
    }
}
