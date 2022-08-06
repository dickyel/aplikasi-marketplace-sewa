<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Comment;
use App\User;


class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $categories = Category::get();
        // $products = Product::with(['galleries'])->paginate(12);

        $products = Product::when(request()->keyword, function($products, $id) {
            $products = $products->where('name', 'like', "%". request()->keyword . '%');
            
        })->with('category')->latest()->paginate(10);
        
        
        return view('pages.home',[
            'categories' => $categories,
            'products' => $products,
            
           
        ]);    
    }

    

    // public function search(Request $request)
    // {
        
    //     return view('pages.home',[
    //         'products' => $products
    //     ]);
    // }
    
    
}
