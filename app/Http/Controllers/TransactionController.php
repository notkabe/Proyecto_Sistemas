<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request): View
    // {
    //     $transactions = Transaction::with('user')->paginate(10); // ✅ Ahora carga la relación con usuario

    //     return view('transaction.index', compact('transactions'))
    //         ->with('i', ($request->input('page', 1) - 1) * $transactions->perPage());
    // }

    public function index(Request $request): View
    {
        $transactions = Transaction::where('user_id', auth()->id())
            ->paginate(10);

        return view('transaction.index', compact('transactions'))
            ->with('i', ($request->input('page', 1) - 1) * $transactions->perPage());
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $transaction = new Transaction();
        $user = User::pluck('name', 'id');

        return view('transaction.create', compact('transaction', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        Transaction::create($data);

        return Redirect::route('transactions.index')
            ->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $transaction = Transaction::find($id);

        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $transaction = Transaction::find($id);
        $user = User::pluck('name', 'id');

        return view('transaction.edit', compact('transaction', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, Transaction $transaction): RedirectResponse
    {
        $transaction->update($request->validated());

        return Redirect::route('transactions.index')
            ->with('success', 'Transaction updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Transaction::find($id)->delete();

        return Redirect::route('transactions.index')
            ->with('success', 'Transaction deleted successfully');
    }
}
