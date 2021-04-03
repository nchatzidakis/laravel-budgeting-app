<?php

namespace App\Http\Controllers\Panel;

use App\Helpers\CacheNameHelper;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
use App\Models\Expense;
use Cache;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $with = [];
        return view('panel.expense.index', $with);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $with = [
            'categories' => Cache::remember(CacheNameHelper::getCategories(), 7200, function () {
                return Category::with(['children'])
                    ->whereNull('parent_id')
                    ->orderBy('name')
                    ->get();
            }),
            'accounts' => Cache::remember(CacheNameHelper::getAccounts(), 7200, function () {
                return Account::orderBy('name')
                    ->get();
            }),
            'companies' => \Auth::user()
                ->sites()
                ->find(session(CacheNameHelper::getCurrentSite()))
                ->expenses
                ->unique('company')
                ->pluck('company'),
        ];

        return view('panel.expense.create', $with);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'category_id' => 'required|exists:categories,id',
            'paid_from' => 'required|exists:accounts,id',
            'amount' => 'numeric',
            'transaction_at' => 'required|date_format:Y-m-d',
            'due_at' => 'nullable|date_format:Y-m-d',
        ]);
        \Auth::user()
            ->sites()
            ->find(session(CacheNameHelper::getCurrentSite()))
            ->expenses()
            ->create(request()->all() + ['user_id' => \Auth::user()->id]);
        return redirect()->route('panel.expenses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
