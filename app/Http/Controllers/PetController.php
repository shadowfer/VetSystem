<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'client') {
            $pets = $user->pets()->orderBy('created_at', 'desc')->paginate(10);
        } else {
            // Admin sees all pets, ordered by pending first
            $pets = Pet::with('user')
                ->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END")
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view('pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        
        // Set status
        if (Auth::user()->role === 'admin') {
            $data['status'] = 'approved';
        } else {
            $data['status'] = 'pending';
        }

        // Set default image based on species if not provided
        if (!isset($data['image'])) {
            $species = strtolower($request->species);
            if (str_contains($species, 'perro') || str_contains($species, 'dog')) {
                $data['image'] = 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?w=600&h=400&fit=crop';
            } elseif (str_contains($species, 'gato') || str_contains($species, 'cat')) {
                $data['image'] = 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=600&h=400&fit=crop';
            } elseif (str_contains($species, 'ave') || str_contains($species, 'bird')) {
                $data['image'] = 'https://images.unsplash.com/photo-1552728089-57bdde30ebd1?w=600&h=400&fit=crop';
            } else {
                $data['image'] = 'https://images.unsplash.com/photo-1597843786271-105124152c74?w=600&h=400&fit=crop'; // Generic pet image
            }
        }

        Auth::user()->pets()->create($data);

        $message = Auth::user()->role === 'admin' 
            ? 'Mascota registrada exitosamente.' 
            : 'Mascota registrada. Pendiente de aprobación por el administrador.';

        return redirect()->route('pets.index')->with('success', $message);
    }

    public function approve(Pet $pet)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $pet->update(['status' => 'approved']);
        return back()->with('success', 'Mascota aprobada exitosamente.');
    }

    public function reject(Pet $pet)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $pet->delete(); // Or update status to 'rejected'
        return back()->with('success', 'Mascota rechazada y eliminada.');
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
    public function edit(Pet $pet)
    {
        if (Auth::user()->role === 'client' && $pet->user_id !== Auth::id()) {
            abort(403);
        }
        return view('pets.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        if (Auth::user()->role === 'client' && $pet->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        $pet->update($request->all());

        return redirect()->route('pets.index')->with('success', 'Pet updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        if (Auth::user()->role === 'client' && $pet->user_id !== Auth::id()) {
            abort(403);
        }
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully.');
    }
}
