<?php

namespace App\Http\Controllers;

use App\Comment;

use App\Http\Requests\Admin\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class DashboardCommentController extends Controller
{
    //
    public function index()
    {
        $comments = Comment::where('products_id', Auth::user()->id); 
        return view('pages.dashboard-comment',[
            'comments' => $comments->get(),
        ]);
    }

    
   

}
