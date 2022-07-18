<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class DashboardSettingController extends Controller
{
    //
    public function store(Request $request)
    {
        $user = Auth::user();
        $categories = Category::all();

        

        return view('pages.dashboard-settings',[
            'user' => $user,
            'categories' => $categories
        ]);
    }
    public function account()
    {
        $user = Auth::user();
        return view('pages.dashboard-account',[
            'user' => $user
        ]);
    }

    // public function uploadStore(Request $request)
    // {
    
    // }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->store_name);
        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }

   
}
