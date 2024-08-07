<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\listings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listing
    public function index(){
        return view('listings',[
            'listings'=>listings::latest()->filter(request(['tag','search']))->paginate(6)
        ]);
    }

    public function search(Request $request){
        $listings=$request->search!= ""?listings::where('title','like','%'.$request->search.'%')->get():listings::all();
        // if($request->search!=""){
        //     $listings=listings::where('title','like','%'.$request->search.'%')->get();
        // }else{
        //     $listings=listings::all();
        // }
        
        //return response()->json($listings);
        if($listings){
            return response()->json([
                "html"=>view("partials._table", compact('listings'))->render()
            ]);
        }else{
            return response()->json(['message' => 'Product not found'], 404); 
        }
        
    }

    //single listing
    public function show(listings $listing){
        
        return view('listing',[
            'listing'=>$listing
        ]);
    }

    public function manage(){
        $listings = auth()->user()->listings()->get();

        //$listings=listings::where("user_id",auth()->id())->get();  
        //dd($listings);
        return view("manage",['listings'=>$listings]);
    }

    public function create(){
        return view("create");
    }

    public function store(Request $request){
        //dd($request->file("logo"));
        $formFields=$request->validate([
            'title'=>'required',
            'company'=>['required',Rule::unique('listings',"company")],
            'age_restriction'=>'required',
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tag'=>'required',
            'description'=>'required'
        ]);
        
        if($request->hasFile("logo")){
            $formFields["logo"]=$request->file("logo")->store("logos","public");
        }

        $formFields["user_id"]=auth()->id();
    

        listings::create($formFields);
        
        return redirect("/")->with('message','Listing created successfully');
        
    }

    public function edit(Listings $listing){

        return view("edit",[
            'listing'=>$listing
        ]);
    }

    public function update(Request $request,Listings $listing){
        $formFields=$request->validate([
            'title'=>'required',
            'company'=>['required'],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tag'=>'required',
            'description'=>'required'
        ]);
        
        if($request->hasFile("logo")){
            $formFields["logo"]=$request->file("logo")->store("logos","public");
        }

        // $listings= Listings::find($listing->id);

        // $listings["title"]=$request->title;
        // $listings["company"]=$request->company;
        // $listings["location"]=$request->location;
        // $listings->update();
        // Listings::updatebyid($listing->id,$formFields);
        $listing->update($formFields);
        return back()->with('message','Listing Updated successfully');
    }

    public function destroy(Listings $listing){
        $listing->delete();
        return redirect("/")->with('message','Listing deleted successfully');
    }
}
