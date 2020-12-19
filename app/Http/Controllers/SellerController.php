<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Seller;
use App\Category;
use App\Subcategory;
use App\User;
use App\Recordlist;
use Auth;

class SellerController extends Controller
{
    public function __construct($value='')
    {
        $this->middleware('isSeller',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $categories =Category::all();
        $sellers=DB::table('sellers')
             ->join('users','users.id','=','sellers.userid')
             ->join('categories','categories.id','=','sellers.categoryid')
             ->join('subcategories','subcategories.id','=','sellers.subcategoryid')
             ->select('sellers.*','categories.name as cname','subcategories.name as scname','users.name as uname')
             ->get();
             //dd($sellers);
      return view('seller.index',compact('sellers','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
       // $recordlist = Recordlist::all();
        //dd($recordlist);    
        
        //dd($recordlist);
        $sub_categories = Subcategory::all();
        //dd($sub_categories);
        return view('seller.create',compact('categories','sub_categories'));
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
        //validation
        $request->validate([
            "title"=>"required|min:2|max:191",
            "price"=>"required|min:4",
            "qty"=>"required",
            "image"=>"required|mimes:jpeg,jpg,png|max:5000",
            
        ]);

      //If include file,upload here
                        //('input type name')
        if($request->hasfile('image')){
            $image=$request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/image/',$name);
            $image='/image/'.$name;

        }
        //dd($request);
        
    

        //save data
        Seller::create([
        //"input name"\
        "title"=>request('title'),
        "price"=>request('price'),
        "quantity"=>request('qty'),
        "image"=>$image,
        "description"=>request('description'),
        "categoryid"=>request('type'),
        "subcategoryid"=>request('subtype'),
        "userid"=>Auth::user()->id,
        ]);

        //redirect
        return redirect('/');



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
        $seller=Seller::find($id);   
        return view('seller.show',compact('seller','categories'));
        /*$sellers=DB::table('sellers')
             ->join('users','users.id','=','sellers.userid')
             ->join('categories','categories.id','=','sellers.categoryid')
             ->join('subcategories','subcategories.id','=','sellers.subcategoryid')
             ->select('sellers.*','categories.name as cname','subcategories.name as scname','users.name as uname')
             ->get();
             //dd($sellers);
      return view('seller.show',compact('sellers'));*/
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
        $seller=Seller::find($id);
        $categories=Category::all();
        $sub_categories=Subcategory::all();
        return view('seller.edit',compact('seller','categories','sub_categories'));
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
        //validation
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
        $seller=Seller::find($id);
        $seller->title=request('title');
        $seller->price=request('price');
        $seller->quantity=request('qty');
        $seller->image=$image;
        $seller->description=request('description');
        $seller->categoryid=request('type');
        $seller->subcategoryid=request('subtype');
        $seller->userid=Auth::user()->id;
        $seller->save();

        return redirect()->route('seller.index',$id);
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
        //dd($id);
         $categories =Category::all();
        $seller=Seller::find($id);
        $seller->delete();
        //redirect
        return redirect('/',compact('categories'));
    }

     public function getCategory(Request $request)
    {
        // dd($request);  
        $data = Subcategory::select('name','id')->where('categoryid',$request->id)->get();
        return response()->json($data);
    }


}
