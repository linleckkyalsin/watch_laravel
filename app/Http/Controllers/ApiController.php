<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\User;
use App\Models\Watch;
use App\Models\Watchcolor;
use App\Models\WatchTagColor;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //





    public function showCat()
    {
        # code...
        $category=Category::all();
        return response()->json(['success'=>true,'data'=>$category]);
    }

    public function showPro(Request $request)
    {
        # code...
        if($request->category_id){
          $product=Watch::orderBy('id','desc')->where('category-id',$request->category_id)->with('watchcolor')->paginate(6);
        }
        elseif($request->color_id){

            // $Wcolor=Watchcolor::orderBy('id','desc')->where('id',$request->color_id)->get();

            // foreach($Wcolor as $wc){
            //          $product=$wc->watch()->paginate(6);

            //         }

            $watchtagcolor=WatchTagColor::orderBy('id','desc')->where('watchcolor_id',$request->color_id)->paginate(6);

            foreach($watchtagcolor as $wtc){

             $product=Watch::orderBy('id','desc')->where('id',$wtc->watch_id)->with('watchcolor')->paginate(6);


            }


        }
        elseif($request->product_id){
            $product=Watch::orderBy('id','desc')->where('id',$request->product_id)->with('watchcolor')->with('category')->first();
        }

        // if($request->color_id){
        //     #$color=Watchcolor::find($request->color_id);
        //     $Wcolor=Watchcolor::orderBy('id','desc')->with('watch')->where('id',$request->color_id)->paginate(3);
        //     $product=[];
        //      foreach($Wcolor as $wc){
        //      array_push($product,$wc->watch);

        //     }



        #}

        else{
            $product=Watch::orderBy('id','desc')->with('category')->with('watchcolor')->paginate(6);
        }
        return response()->json(['success'=>true,'data'=>$product]);
    }
    public function showUser()
    {
        # code...
        $user=User::all();
        return response()->json(['success'=>true,'data'=>$user]);
    }
    public function showcolor(Request $request)
    {
        # code...
        if($request->product_id){
            // $color=Watch::orderBy('id','desc')->where('id',$request->product_id)->with
            $Watchcolor=WatchTagColor::orderBy('id','desc')->where('watch_id',$request->product_id)->get();
            $color=[];
            foreach($Watchcolor as $w){
               # $color=
                array_push($color,Watchcolor::orderBy('id','desc')->where('id',$w->watchcolor_id)->first());
            }


        }
        else{$color=Watchcolor::all();}

        return response()->json(['success'=>true,'data'=>$color]);
   }
}
