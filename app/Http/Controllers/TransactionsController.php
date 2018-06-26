<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use App\Transaction;
use App\Http\Requests\StoreAndUpdateTransaction;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::pluck('name', 'id')->toArray();

        return view('transaction.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAndUpdateTransaction  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAndUpdateTransaction $request)
    {
        $data = $request->all();

        Transaction::create($data);

        return redirect('/transactions')->with('status', 'Transaction created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);

        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        $accounts = Account::pluck('name', 'id')->toArray();

        return view('transaction.edit', compact('transaction', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreAndUpdateTransaction  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAndUpdateTransaction $request, $id)
    {
        $data = $request->all();

        $transaction = Transaction::find($id);

        $transaction->update($data);

        return redirect()->back()->with('status', 'Transaction updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        $transaction->delete();

        return redirect()->back()->with('status', 'Transaction deleted!');
    }

    /**
     * Response json of transactions.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function transactionsList($id = false)
    {
        if($id) {
            $account = Account::find($id);

            $transactions = $account->transactions;
        }
        else {
            $transactions = Transaction::with('account')->get();
        }

        $transactions->each(function($q) {
            $q['account_name'] = $q['account']['name'];
        });

        return response()->json(['data' => $transactions, 'count' => count($transactions)]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $account_id
     * @return \Illuminate\Http\Response
     */
    public function showAccountTransactions($account_id)
    {
        return view('transaction.list', compact('account_id'));
    }

}
