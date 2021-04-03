<?php

namespace App\Http\Controllers\Panel;

use App\Helpers\CacheNameHelper;
use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('panel.account.index', [
            'accounts' => Account::all(),
        ]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('panel.account.create');
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(): RedirectResponse
    {
        request()->validate([
            'type' => [
                'required',
                Rule::in(collect(Account::$types)->keys()),
            ],
            'name' => 'required',
            'currency' => [
                'required',
                Rule::in(collect(Account::$currencies)->keys()),
            ],
            'initial_amount' => 'required',
        ]);
        $account = \Auth::user()
            ->sites()
            ->find(session(CacheNameHelper::getCurrentSite()))
            ->accounts()
            ->create(request()->all() + ['user_id' => \Auth::user()->id]);
        \Cache::forget(CacheNameHelper::getAccounts());
        return redirect()->route('panel.accounts.show', $account->uuid);
    }

    /*
     * Display the specified resource.
     */
    public function show(Account $account): View
    {
        echo 'pending';
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account): View
    {
        return view('panel.account.edit', [
            'account' => $account,
        ]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account): RedirectResponse
    {
        request()->validate([
            'type' => [
                'required',
                Rule::in(collect(Account::$types)->keys()),
            ],
            'name' => 'required',
            'currency' => [
                'required',
                Rule::in(collect(Account::$currencies)->keys()),
            ],
            'initial_amount' => 'required',
        ]);
        $account->update(request()->all());
        \Cache::forget(CacheNameHelper::getAccounts());
        return redirect()->route('panel.accounts.show', $account->uuid);
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account): RedirectResponse
    {
        $account->delete();
        \Cache::forget(CacheNameHelper::getAccounts());
        return redirect()->route('panel.accounts.index');
    }
}
