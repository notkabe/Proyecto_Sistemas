<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Obtener el cliente asociado al usuario logueado
        $client = Client::where('user_id', Auth::id())->first();

        // Verificar si se encuentra el cliente
        if ($client) {
            return view('client.index', compact('client'));
        } else {
            // Si no se encuentra, retornar un error o redirigir
            return view('client.create')->with('error', 'Client not found. Please create your profile.');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $client = new Client();

        return view('client.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request): RedirectResponse
    {
        Client::create($request->validated());

        return Redirect::route('clients.index')
            ->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $client = Client::findOrFail($id);

        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $client = Client::find($id);

        $user = User::pluck('email', 'id');

        return view('client.edit', compact('client', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client): RedirectResponse
    {
        // Validación de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|numeric',
            'balance' => 'required|numeric',
        ]);

        // Actualizar el cliente con los datos validados
        $client->update($validated);

        // Redirigir con un mensaje de éxito
        return redirect()->route('clients.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        // Encontrar el cliente y su usuario asociado
        $client = Client::findOrFail($id);

        // Obtener el usuario asociado al cliente (si está disponible)
        $user = $client->user;

        // Eliminar el cliente
        $client->delete();

        // Si el usuario existe, eliminarlo y hacer logout
        if ($user) {
            $user->delete();  // Eliminar al usuario
            Auth::logout();    // Logout del usuario
        }

        // Redirigir al home o donde desees
        return Redirect::route('home')
            ->with('success', 'Client and user deleted successfully, you are logged out.');
    }
}
