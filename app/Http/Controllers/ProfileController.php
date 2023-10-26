<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'countries' => Country::orderBy('name', 'ASC')->get(),
            'calling_codes' => Country::orderBy('calling_code', 'ASC')->distinct('calling_code')->pluck('calling_code'),
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit2(Request $request): View
    {
        return view('profile.edit2', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->whatsapp = '+' . $request->whappcode . ' ' . preg_replace('/[^0-9]/', '', $request->whappnum);
        
        session(['my_locale' => $request->language]);
        //App::setLocale($request->language);
        //Config::set('app.locale', $request->language);

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function avatar(Request $request): View
    {
        return view('profile.avatar', [
            'user' => $request->user(),
            'countries' => Country::orderBy('name', 'ASC')->get(),
            'calling_codes' => Country::orderBy('calling_code', 'ASC')->distinct('calling_code')->pluck('calling_code'),
        ]);
    }

    public function avatar_update(Request $request): RedirectResponse
    {
        if($request->hasFile('picture'))
        {
            $this->validate($request, [
                'picture' => 'required|image|mimes:jpg,jpeg,png,gif,bmp,svg|max:2048',
            ]);
            
            $user=Auth::user();

            $resized = Image::make($request->file('picture'))->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio(); 
                $constraint->upsize();
            })->encode('jpg',75);


            $filename=sprintf('_profile-%06d.%s',$user->id,'jpg');
            Storage::put('public/images/'.$filename, (string) $resized);
            $user->picture=$filename;
            $user->save();
        }
        return Redirect::route('profile.edit')->with('status', 'picture-updated');
    }  
    
    public function developer(): View
    {
        return view('profile.developer.register');    
    }
        
}
