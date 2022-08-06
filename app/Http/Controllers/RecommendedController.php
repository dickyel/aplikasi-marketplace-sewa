<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Comment;
use App\Product;
use App\Similarity;
use App\Prediction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RecommendedController extends Controller
{
    
    public function index()
    {
        $ratingUser = Comment::all();

        
    }
   
}
