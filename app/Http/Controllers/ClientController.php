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
        $client = Client::where('user_id', Auth::id())->first();

        if ($client) {
            return view('client.index', compact('client'));
        } else {
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|numeric',
            'balance' => 'required|numeric',
        ]);

        $client->update($validated);

        return redirect()->route('clients.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $client = Client::findOrFail($id);

        $user = $client->user;

        $client->delete();

        if ($user) {
            $user->delete();
            Auth::logout();
        }

        return Redirect::route('home')
            ->with('success', 'Client and user deleted successfully, you are logged out.');
    }
}
