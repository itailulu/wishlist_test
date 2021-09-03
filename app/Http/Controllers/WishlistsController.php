<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Providers\WishlistCreated;
use Illuminate\Http\Request;

class WishlistsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "wishlist" => "required",
            "email" => "required|email"
        ]);

        $wishlist = Wishlist::create(
                [
                    "wishlist" => $request->wishlist,
                    "email" => $request->email,
                ]
            );
        
        if($wishlist){
            event(new WishlistCreated($wishlist));
            return response()->json(["message" => "Wishlist successfuly sent"],200);
        }else{
            return response()->json(["message" => "something went wrong"],500);
        }
        
    }
}
