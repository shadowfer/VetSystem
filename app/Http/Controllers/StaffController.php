<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = User::where('role', 'staff')->paginate(10);
        return view('admin.staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'staff',
            'is_active' => true,
        ]);

        return redirect()->route('admin.staff.index')->with('success', 'Personal registrado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $staff)
    {
        if ($staff->role !== 'staff') {
            return redirect()->route('admin.staff.index')->with('error', 'Usuario no es parte del personal.');
        }
        return view('admin.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $staff)
    {
        if ($staff->role !== 'staff') {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$staff->id],
            'is_active' => ['boolean'],
        ]);

        $staff->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.staff.index')->with('success', 'Personal actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $staff)
    {
        if ($staff->role !== 'staff') {
            abort(403);
        }
        
        $staff->delete();
        return redirect()->route('admin.staff.index')->with('success', 'Personal eliminado exitosamente.');
    }
}
