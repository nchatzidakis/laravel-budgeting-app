<?php

namespace App\Http\Controllers\Datatables\Panel;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Expense;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ExpenseController extends Controller
{
    function default() {

        $model = Expense::with(['paidFrom', 'category']);

        return Datatables::of($model)
            ->addColumn('paid_from_label', function($item) {
                return "[".Account::$types[$item->paidFrom->type]."] {$item->paidFrom->name}";
            })
            ->addColumn('amount_label', function($item) {
                return "{$item->amount} ".Account::$currencies[$item->paidFrom->currency];
            })
            ->addColumn('category_label', function($item) {
                $category = '';
                if ($item->category->parent != null) {
                    $category = "{$item->category->parent->name} >";
                }
                return "{$category} {$item->category->name}";
            })
            ->addColumn('actions', 'panel.expense.datatables.actions')
            ->rawColumns(['actions', 'amount_label'])
            ->make(true);
    }
}
