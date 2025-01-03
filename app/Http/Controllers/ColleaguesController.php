<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ColleaguesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->load('colleagues');

        return Inertia::render('Colleagues/Index', [
            'colleagues' => \App\Http\Resources\UserResource::collection($user->colleagues()->paginate(10)),
        ]);
    }
    public function search(Request $request)
    {
        $searchQuery = $request->input('search');
        $user = Auth::user();

        if (!$searchQuery) {
            return response()->json([]);
        }

        // Wyszukaj użytkowników (po nazwie, z wykluczeniem siebie)
        $searchedUsers = User::where('id', '!=', $user->id)
            ->where('name', 'like', '%' . $searchQuery . '%')
            ->take(10)
            ->get(['id', 'name', 'email']); // Ogranicz pola w odpowiedzi

        return response()->json($searchedUsers);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
