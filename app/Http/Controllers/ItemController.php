<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['items'] = Item::where('user_id', Auth::User()->id)->latest()->paginate(12);
        $data['totalItems'] = Item::where('user_id', Auth::user()->id)->sum('item_amount');

        return view('pages.items.index', $data);
    }

    public function create()
    {
        return view('pages.items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_title' => 'required',
            'item_amount' => 'required',
            'item_date'=> 'required'
        ]);

        $items = new Item();
        $items->item_title = $request->item_title;
        $items->item_amount = $request->item_amount;
        $items->item_date = $request->item_date;
        $items->user_id = Auth::user()->id;
        $items->save();

        return redirect('/items')->with('message', 'Nieuwe Meubel Toegevoegd');
    }

    public function edit($id)
    {
        $data['item'] = item::findOrFail($id);
        return view('pages.items.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'item_title' => 'required',
            'item_amount' => 'required',
            'item_date'=> 'required'
        ]);

        $item = Item::findOrFail($request->item_id);
        $item->item_title = $request->item_title;
        $item->item_amount = $request->item_amount;
        $item->item_date = $request->item_date;
        $item->update();

        return redirect('/items')->with('message', 'Meubel Is Succesvol Aangepast');
    }

    public function destroy($id)
    {
        Item::findOrFail($id)->delete();
        return back()->with('message', 'Meubel Is Succesvol Verwijdert');
    }
}
