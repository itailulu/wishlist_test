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
        /**
         *  probably will never get to here, as errors in Wishlist::create will throw an exception and you will not even get here.
         * You can confirm by sending and email with length > 255 - you'll get 500 with SQL error, not from the following return statement
         */
            return response()->json(["message" => "something went wrong"],500);
        }
        
    }
}
