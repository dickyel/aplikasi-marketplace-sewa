<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Helpers;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;


class RecommendedController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $recommendation = array();

        $matrix = array();
        $users_id= Auth::user()->id;

       
        if($users_id)
        {
            $product = Comment::whereNotIn('users_id', [$users_id])->orderBy('rating','DESC')->get()->take(10);
            foreach($product as $p)
            {
                $users_id1 = $p->users_id;
                $matrix['user'.$users_id1]['product' . $p->products_id] = $p->rating;

            }

            $productSelf = Comment::whereIn('users_id',[$users_id])->orderBy('rating','DESC')->get();

            foreach($productSelf as $ps)
            {
                $users_id2 = $ps->users_id;
                $matrix['user'.$users_id2]['product' . $ps->products_id] = $ps->rating;
            }

            if (count($matrix)>1){
                $recommendation=@getRecommendation($matrix,'user'.$users_id);
            }
        }

        $recommendation = (object) collect($recommendation);

        // return $recommendation;
        return view( 'pages.recommendation',
            [
                'recommendation' => $recommendation
            ]
        );

    }    
}

