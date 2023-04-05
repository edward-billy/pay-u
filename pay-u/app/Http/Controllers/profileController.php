<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $data = $request->validated();


        $user->update($data);
    
        return redirect()->route('profile.edit')->with('success', 'Your profile has been updated successfully.');
    }
    
}
