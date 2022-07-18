<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Transaction;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = User::count();
        $revenue = Transaction::where('transaction_status', 'SUDAH DIKEMBALIKAN')->sum('total_price');
        $transaction = Transaction::count();
        return view('pages.admin.dashboard',[
            'user' => $user,
            'revenue' => $revenue,
            'transaction' => $transaction,
        ]);
    }
}
