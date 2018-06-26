<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Http\Requests\StoreAndUpdateAccount;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAndUpdateAccount  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAndUpdateAccount $request)
    {
        $data = $request->all();

        Account::create($data);

        return redirect('/accounts')->with('status', 'Account created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::find($id);

        return view('account.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::find($id);

        return view('account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreAndUpdateAccount  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAndUpdateAccount $request, $id)
    {
        $data = $request->all();

        $account = Account::find($id);

        $account->update($data);

        return redirect('/accounts')->with('status', 'Account updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::find($id);

        $account->delete();

        return redirect('/accounts')->with('status', 'Account deleted!');
    }


    /**
     * Response json of accounts.
     *
     * @return \Illuminate\Http\Response
     */
    public function accountsList()
    {
        $accounts = Account::all()->toArray();

        return response()->json(['data' => $accounts, 'count' => count($accounts)]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function transactionsList($id)
    {
        $account = Account::find($id);

        $transactions = $account->transactions;

        return view('account.show', compact('transactions'));
    }

}
