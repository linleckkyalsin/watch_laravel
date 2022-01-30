<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Watch;
use App\Models\Watchcolor;
use App\Models\WatchTagColor;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $watch=Watch::orderBy('id','desc')->with('category')->paginate(2);
        return view('product.index',compact('watch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category=Category::all();
        $color=Color::all();
        $watchcolor=Watchcolor::all();

        return view('product.create',compact('category','watchcolor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,jfif',
            'price'=>'required',
            'description'=>'required'
        ]);
        $file=$request->file('image');
        $file_name=uniqid().str_replace(' ','', $file->getClientOriginalName());
        $file->move(public_path('/images'),$file_name);

        $watch=Watch::create([
               'category-id'=>$request->category_id,
               'color_id'=>1,
              'name'=>$request->name,
               'price'=>$request->price,
               'image'=>$file_name,
               'description'=>$request->description
        ]);
        foreach($request->colors as $c){
            WatchTagColor::create([
              'watchcolor_id'=>$c,
              'watch_id'=>$watch->id
            ]);
      };

          return redirect()->back()->with('success','Created Successfully');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category=Category::all();

        $watchcolor=Watchcolor::all();
        $watch=Watch::where('id',$id)->with('category')->with('watchcolor')->first();
     $watchtagcolor=WatchTagColor::where('watch_id',$watch->id)->get();

        return view('product.edit',compact('category','watchcolor','watch'),['tag'=>$watchtagcolor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //>


        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);
        $watch=Watch::where('id',$id)->first();

        if($request->file('image')){
            File::delete(public_path('/images/'),$watch->image);
            $image=$request->file('image');
            $image_name=uniqid().str_replace(' ','',$image->getClientOriginalName());
            $image->move(public_path('/images/'),$image_name);

        }
        else{
           $image_name=$watch->image;
        }
        Watch::where('id',$id)->update([

            'category-id'=>$request->category_id,
            'color_id'=>1,
            'name'=>$request->name,
             'price'=>$request->price,
             'image'=>$image_name,
             'description'=>$request->description

    ]);
    $req_color=$request->colors;
    $watch_colors=WatchTagColor::where('watch_id',$id)->get();
    $watch=Watch::find($id)->with('watchcolor')->first();
    $w=$watch->watchcolor;

    if( count($w)>count($req_color) ){
       $watch->watchcolor()->sync($req_color);
    }elseif( count($w)===count($req_color) or  count($w)<count($req_color))
    {
       $watch->watchcolor()->sync($req_color,false);}

    $colors=Watchcolor::all();

$colors=Watchcolor::all();
$watch_colors=WatchTagColor::where('watch_id',$id)->get();
$req_colors=$request->colors;


    // foreach($request->colors as $c){
    //         WatchTagColor::where('watch_id',$id)->update([
    //           'watchcolor_id'=>$c,
    //           'watch_id'=>$id
    //         ]);
    //   };
    // if(count($watch_colors)===count($req_colors) or count($watch_colors)>count($req_colors)  ){
    //     foreach($request->colors as $c){
    //         WatchTagColor::where('watch_id',$id)->update([
    //           'watchcolor_id'=>$c,
    //           'watch_id'=>$id
    //         ]);
    //   };
    // };
   # if(count($watch_colors)<count($req_colors))
    // {
    //        WatchTagColor::create([
    //         'watchcolor_id'=>$c,
    //         'watch_id'=>$id
    //        ]);
    // }

    return redirect()->back()->with('success','Updated Successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Watch::where('id',$id)->delete();
        return redirect()->back()->with('success','Deleted Successfull');

  }
}
