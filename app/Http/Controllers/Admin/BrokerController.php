<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Broker;
use App\Models\Country;
use App\Models\Document;
use App\Models\Dclass;
use App\Http\Requests\BrokerRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.broker.index')->with([
            'brokers'=>Broker::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.broker.edit')->with([
            'title' => 'Nueva comercializadora',
            'action' => route('admin.brokers.store'),
            'broker' => new Broker,
            'countries' => Country::orderBy('name', 'ASC')->get(),
            'develop_classes' => DevelopClass::all(),     
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrokerRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if(!isset($data['speciality'])) $data['speciality'] = [];
        $broker = Broker::create($data);
        $this->brochureUpload($request, $broker);

        return redirect(route('admin.brokers.edit', $broker->id))->withSuccess('El registro fue creado exitosamente!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Broker $broker): View
    {
        $broker->brochure = $broker->documents()
                                         ->where(['type'=>'brochure','status'=>'enabled'])
                                         ->first();

        $broker->picture = $broker->documents()
                                         ->where(['type'=>'picture','status'=>'enabled'])
                                         ->first();

        return view('admin.broker.edit')->with([
            'title' => 'Editar desarrolladora',
            'action' => route('admin.brokers.update', ['broker' => $broker->id]),
            'broker' => $broker,
            'countries' => Country::orderBy('name', 'ASC')->get(),
            'develop_classes' => Dclass::all(),     
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrokerRequest $request, Broker $broker): RedirectResponse
    {
        $data = $request->validated();

        if(!isset($data['speciality'])) $data['speciality'] = [];

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
                        $path=sprintf("public/documents/brokers/%d/%s.%s", $broker->id,'picture', $image_parts[5]);
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

        $broker->update($data);
        $this->brochureUpload($request, $broker);

        return redirect()->back()->withSuccess('La información fue guardada exitosamente!');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Broker $broker): RedirectResponse
    {
        $broker->delete();
        return back()->withInput();
    }

    public function brochureDelete(Broker $broker): RedirectResponse
    {
        $brochure = $broker->documents()
                              ->where(['type'=>'brochure','status'=>'enabled'])
                              ->first();
        if($brochure) {
            $brochure->delete();
        }

        return back()->withInput();
    }


    private function brochureUpload(BrokerRequest $request, Broker $broker)
    {
        if($request->file('brochure') && $request->file('brochure')->isValid()) {
            $filename=sprintf("%s.%s", date('YmdHis'),$request->brochure->extension());
            $path = $request->brochure->storeAs('public/documents/brokers/'.$broker->id, $filename);
            $broker->documents()->create([
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
