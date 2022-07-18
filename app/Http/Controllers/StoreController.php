<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Comment;
use App\Product;

use App\Http\Requests\Admin\CommentRequest;

class StoreController extends Controller
{
    //
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('store_status', 1)->get();
        return view('pages.store',[
            'users' => $users
        ]);
    }

    public function detail(Request $request, $store_name)
    {
        $users = User::all();
        $user  = User::where('store_name', $store_name)->firstOrFail();
        
        $products = Product::where('users_id', $user->id)
                    ->get();        
        return view('pages.detail-store',[
            'users' => $users,
            'user' => $user,
        
            'products' => $products
        ]);
    }

    // public function comment(CommentRequest $request)
    // {
    //     Comment::create([
    //         'users_id' => request()->users_id,
    //         'products_id' => request->products_id,
    //         'rating' => request()->rating,
    //         'message' => request()->message
    //     ]);
        
    //     return redirect()->route('detail-stores');
    // }

}
