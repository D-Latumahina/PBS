<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Note;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function overview()
    {

        $data['incomes'] = Income::where('user_id', Auth::User()->id)->whereYear('income_date', Carbon::now()->year)->whereMonth('income_date', Carbon::now()->month)->sum('income_amount');
        $data['expenses'] = Expense::where('user_id', Auth::User()->id)->whereYear('expense_date', Carbon::now()->year)->whereMonth('expense_date', Carbon::now()->month)->sum('expense_amount');
        $data['balance'] = $data['incomes'] - $data['expenses'];

        return view('pages.dashboard', $data);
    }

    public function summary()
    {
        $incomes = Income::where('user_id', Auth::User()->id)->get()->toArray();
        $expenses = Expense::where('user_id', Auth::User()->id)->get()->toArray();
        foreach ($incomes as $key => $value) {
            $incomes[$key]['type'] = 'income';
        }

        foreach ($expenses as $key => $value) {
            $expenses[$key]['type'] = 'expense';
        }

        $data['results'] = array_merge($incomes, $expenses);
        $data['total_income'] = Income::where('user_id', Auth::User()->id)->sum('income_amount');
        $data['total_expense'] = Expense::where('user_id', Auth::User()->id)->sum('expense_amount');
        $data['totalItems'] = Item::where('user_id', Auth::user()->id)->sum('item_amount');
        $data['totalNotes'] = Note::where('user_id', Auth::user()->id)->sum('note_amount');
        $data['balance'] = $data['total_income'] - $data['total_expense'];

        return view('pages.summary', $data);
    }
}
