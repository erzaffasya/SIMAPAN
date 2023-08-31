<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.user.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'email' => 'required',
        ]);

        $User = User::create([
            "name" => $request->name,
            "role" => $request->role,
            "email" => $request->email,
            "password" => bcrypt($request->password),

        ]);

        // UserRole::create([
        //     'role_id' => $request->role_id,
        //     'user_id' => $User->id
        // ]);


        return redirect()->route('user.index')
            ->with('success', 'User Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     */
    public function show(User $user)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     */
    public function edit(User $user)
    {
        return view('admin.user.ubah', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            // 'user' => 'required',
        ]);

        $user->name = $request->name;
        if ($request->email != null) {
            $user->email = $request->email;
        }
        if ($request->role != null) {
            $user->role = $request->role;
        }
        $user->phone = $request->phone;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('user.index')
            ->with('success', 'User Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User Berhasil Dihapus');
    }


    public function profile(User $user)
    {
        return view('admin.profil', compact('user'));
    }
}
