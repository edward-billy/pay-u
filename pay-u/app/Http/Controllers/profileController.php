<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;

class profileController extends Controller
{
    // untuk melakukan edit pada profile
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user()
        ]);
    }
    public function update(UpdateProfileRequest $request)
    {
        $user = $request->user();
        $user->update($request->validated());
    
        return redirect()->route('profile.edit');
    }
    

}
