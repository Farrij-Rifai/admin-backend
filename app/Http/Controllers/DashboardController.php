<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //BARIS UNTUK YANG TIDAK LOGIN TIDAK BISA MASUK
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() 
    {
        $income = Transaction::where('transaction_status', 'SUCCESS')->sum('transaction_total');
        $sales = Transaction::count();
        $items = Transaction::orderBy('id', 'DESC')->take(5)->get();
        $pie = [
            'pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'failed' => Transaction::where('transaction_status', 'FAILED')->count(),
            'success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
        ];

        return view('pages.dashboard')->with([
            'income' => $income,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie
        ]);
    }
}
