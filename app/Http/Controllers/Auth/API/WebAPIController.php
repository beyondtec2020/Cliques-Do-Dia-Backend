<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\City;
use App\AddList;

class WebAPIController extends Controller
{    
    public function categories(){

        $cat = Category::orderBy('position','asc')->where('status',1)->get();        
        
        return response()->json([
            'data'=>$cat,
            'success'=>true
        ],200);

    }

    public function cities(){

        $city = City::with('addlists')->where('status',1)->paginate(12);
        
        return response()->json([
            'data'=>$city,
            'success'=>true
        ],200);
    }

    public function getPopular(){
        
        $popular = AddList::where('status', 1)->orderby('reviews', 'desc')->take(12)->get();
        
        return response()->json([
            'data'=>$popular,
            'success'=>true
        ],200);

    }

    public function getLatest(){        
        
        $latest = AddList::latest()->where('status', 1)->take(12)->get();        
        
        return response()->json([
            'data'=>$latest,
            'success'=>true
        ],200);
    }

    public function getFeatured(){        
        
        $featured = AddList::latest()->where('status', 1)->where('is_featured', 1)->take(21)->get();
        
        return response()->json([
            'data'=>$featured,
            'success'=>true
        ],200);
    }
}
