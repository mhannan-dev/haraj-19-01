<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Payment;

class TransactionController extends Controller
{
    public function getIndex()
    {
        $pageTitle = 'Transactions';
        $transactions = Payment::orderBy('id','desc')->paginate(getPaginate());
        return view('admin.transaction.index', compact('pageTitle', 'transactions'));
    }
}
