<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\User;
use App\Http\Requests\Admin\UserRequest;


class DashboardUploadController extends Controller
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', Auth::user()->id)->get();    
        return view('pages.dashboard-upload',[
            'users' => $users
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();

        $item = Auth::user();

        $data = [
            
            'ktp_photo' => $request->file('ktp_photo')->store('assets/user','public'),
            'selfie_photo' => $request->file('selfie_photo')->store('assets/user','public'),
            'logo_store' => $request->file('logo_store')->store('assets/user','public'),
        ];

        $item->update($data);

        return redirect()->route($redirect);
    }
}
