<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Seller;
use App\User;
use App\Category;
use App\Subcategory;

class SposthistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $categories =Category::all();
        $id=Auth::user()->id;
    
        $sposts=DB::table('sellers')
                    ->join('users','users.id','=','sellers.userid')
                    ->join('categories','categories.id','=','sellers.categoryid')
                    ->join('subcategories','subcategories.id','=','sellers.subcategoryid')
                    ->where('sellers.userid',$id)
                    ->select('sellers.*','users.name as name','categories.name as cname','subcategories.name as scname')
                    ->get();
                    ///dd($cposts);
                    return view('sposthistory.index',compact('sposts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
         $categories =Category::all();
        $spost = Seller::find($id);
        return view('sposthistory.show',compact('spost','categories'));
        /*$id=Auth::user()->id;
    
        $sposts=DB::table('sellers')
                    ->join('users','users.id','=','sellers.userid')
                    ->join('categories','categories.id','=','sellers.categoryid')
                    ->join('subcategories','subcategories.id','=','sellers.subcategoryid')
                    // ->where('sellers.userid',$id)
                    ->select('sellers.*','users.name as name','categories.name as cname','subcategories.name as scname')
                    ->get();
                    ///dd($cposts);
                    return view('sposthistory.show',compact('sposts'));*/
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
        $spost=Seller::find($id);
        $categories=Category::all();
        $sub_categories=Subcategory::all();
        return view('sposthistory.edit',compact('spost','categories','sub_categories'));
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
        //
        $request->validate([
            "title"=>"required|min:2|max:191",
            "price"=>"required|min:2",
            "image"=>"sometimes|mimes:jpeg,jpg,png|max:5000",
            
        ]);

        //file upload
         if($request->hasfile('image')){
            $image=$request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/image/',$name);
            $image='/image/'.$name;

        }else
        {
            $image=request('oldimg');
        }

        //update data
        $spost=Seller::find($id);
        $spost->title=request('title');
        $spost->price=request('price');
        $spost->quantity=request('qty');
        $spost->image=$image;
        $spost->description=request('description');
        $spost->categoryid=request('type');
        $spost->subcategoryid=request('subtype');
        $spost->userid=Auth::user()->id;
        $spost->save();

        return redirect()->route('sposthistory.show',$id);
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
         $categories =Category::all();
         $spost=Seller::find($id);
        $spost->delete();
        //redirect
        return redirect()->route('sposthistory.index',compact('categories'));
    }
}
