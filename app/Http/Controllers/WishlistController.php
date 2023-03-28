<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index(){
        $users = User::get();

        $users = Wishlist::get();


        return view('wishlist.index');
    }

    public function storeWishlist(Request $request) {
        $incomingFields = $request->validate([
            'product' => 'required',
            'description' => 'required',
            'price' => 'required',
            'url' => 'required|url',
            'image' => '',
        ]);

        $incomingFields['product'] = strip_tags($incomingFields['product']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);
        $incomingFields['url'] = strip_tags($incomingFields['url']);
        $incomingFields['user_id'] = auth()->id();

       $newWishlist = Wishlist::create($incomingFields);
       return redirect("/wishlist")->with('success', 'New Item succesfully added to the wishlist');
    }

    public function createForm() {
        return view('wishlist.create');
    }

    public function users()
    {
        $users = User::get();
        return view('users', compact('users'));
    }

    public function user($id)
    {
        $user = User::find($id);
        return view('usersView', compact('user'));
    }


}
