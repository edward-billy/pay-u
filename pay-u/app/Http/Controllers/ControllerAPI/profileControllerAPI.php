<?php

namespace App\Http\Controllers\ControllerAPI;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Validator;

class profileControllerAPI extends Controller
{
    // Untuk melakukan edit pada profile
    public function edit(Request $request)
    {

        return response()->json([
            'user' => $request->user(),
            'message' => 'Data berhasil tampil',

        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
        ], [
                'name.min' => "Kolom harus memiliki minimal 3 karakter",
                'name.required' => "Kolom ini wajib diisi",
                'email.email' => "Kolom ini harus berbentuk email",
                'email.required' => "Kolom ini wajib diisi",
            ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response()->json([
            'message' => 'Your profile has been updated successfully.',
            'data' => $user,
        ], 200);
    }
}