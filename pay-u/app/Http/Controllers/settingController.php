<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::all();
        return view('setting.settinguser', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('setting.adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'role' => 'required|string'
        ]);

        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->role = $request->role;

        $users->save();

        session()->flash('success', 'Akun telah ditambahkan, silahkan coba login');
        return redirect("setting");

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
    public function edit(string $id)
    {
        //
        $user = User::find($id);

        return view('setting.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::find($id);

        $request->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'role' => 'required',
                'password' => 'required|min:8',
            ],
            [
                'name.min' => "Kolom harus memiliki minimal 3 karakter",
                'name.required' => "Kolom ini wajib diisi",
                'email.email' => "Kolom ini harus berbentuk email",
                'email.required' => "Kolom ini wajib diisi",
                'role.required' => "Harus memiliki Role",
                'password.required' => "Kolom ini wajib diisi",
                'password.min' => 'Kolom harus memiliki minimal 8 karakter'
            ]
        );

        User::where('id', $user->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => bcrypt($request->password),
            ]);

        session()->flash('success', 'User telah diupdate.');
        return redirect("setting");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        User::destroy($id);

        session()->flash('success', 'User telah berhasil dihapus.');
        return redirect("setting");
    }
}