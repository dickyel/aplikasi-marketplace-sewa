<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Comment;
use App\Http\Requests\Admin\CommentRequest;

use Illuminate\Support\Facades\Auth;

class DetailProductController extends Controller
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        $product = Product::with(['galleries','user'])->where('slug', $id)->firstOrFail();
        
        $comment = Comment::where('products_id',$product->id)->with('user')->get();
        
        $comment_count = $comment->count();
        $rating = Comment::where('products_id',$product->id)->sum('rating');
               
        if($rating==0){
            $results = $comment_count;
            
        }elseif($rating!=0){
            $results = $rating /$comment_count;
        }

        
        
        return view('pages.detail-product', [
            'product' => $product,
            'comment' => $comment,
            'comment_count' => $comment_count,
            'results' => $results,
           
           
        ]);

        
    }

    public function add(Request $request, $id)
    {
        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
        ];

        Cart::create($data);

        return redirect()->route('cart');
    }

    public function comment(Request $request)
    {
        Comment::create([
            'users_id' => request()->users_id,
            'products_id' => request()->products_id,
            'rating' => request()->rating,
            'message' => request()->message
        ]);

        $product = Product::with(['galleries','user'])->findOrFail(request()->products_id);
        return redirect()->route('detail-product', $product->slug);
    }

}
