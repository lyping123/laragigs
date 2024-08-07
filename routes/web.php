<?php

use App\Models\Listing;
use App\Models\listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\membersController;
use App\Http\Middleware\checkAge;
use App\Http\Middleware\checkAuth;
use App\Models\demotable;
use App\Models\fruit;
use App\Models\models;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function () {

    
//     return view('listings',[
//         'heading'=>'lastes list',
//         'listings'=>[
//             [
//                 'id'=>1,
//                 'title'=>'Listing One',
//                 'description'=>'this is a good thing'
//             ],
//             [
//                 'id'=>2,
//                 'title'=>'Listing two',
//                 'description'=>'this is not a good thing'
//             ]
//         ]
//     ]);
// });

// Route::get('/', function () {
//     //return view("listings");
//     return view('listings',[
//         'listings'=>Listings::all()
//     ]);
// });




// show all
// Route::get('/',[ListingController::class,'index']);

// //show create form
// Route::get('/listings/create',[ListingController::class,'create'])->middleware("auth");

// //store listing data
// Route::post('/listings',[ListingController::class,'store']);

// //show listing data
// Route::get('/listing/{listing}',[ListingController::class,'show'])->middleware("auth");

// //show edit form
// Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware("auth");
// //submit to update
// Route::put('/listings/{listing}/',[ListingController::class,'update'])->name("update.product");
// //delete listing
// Route::delete('/listings/{listing}/',[ListingController::class,'destroy']);

// Route::get('/listings/manage',[ListingController::class,'manage'])->middleware("auth");


// Route::controller(ListingController::class)->group(function(){
//     Route::get("/",'index');
//     Route::get("/listing/create",'create')->name("createform")->middleware(checkAuth::class);
//     Route::post("/listings",'store')->missing(function (Request $request) {
//         return redirect('/listings');
//     })->middleware(("auth"));
//     Route::get("/listing/{listing}",'show')->name('listinglist')->middleware(checkAge::class);

//     Route::get("/listings/{listing}/edit",'edit')->name('editform')->middleware(checkAuth::class);
//     Route::put("/listings/{listing}/",'update')->name('update.product')->middleware(checkAuth::class);
    
//     Route::delete("/listings/{listing}/",'destroy')->name("listing.destroy")->middleware([checkAuth::class]);
    
//     Route::get("/listings/manage",'manage');
// });

Route::post("/listings/search",[ListingController::class,'search'])->name("search");

Route::middleware(checkAuth::class)->group(function (){
    Route::controller(ListingController::class)->group(function(){
        Route::get("/",'index')->withoutMiddleware(checkAuth::class);
        Route::get("/listing/create",'create')->name("createform");
        Route::post("/listings",'store')->missing(function (Request $request) {
            return redirect('/listings');
        });
        Route::get("/listing/{listing}",'show')->name('listinglist')->middleware(checkAge::class);

        Route::get("/listings/{listing}/edit",'edit')->name('editform');
        Route::put("/listings/{listing}/",'update')->name('update.product');
        
        Route::delete("/listings/{listing}/",'destroy')->name("listing.destroy");
        
        Route::get("/listings/manage",'manage');
    });
});




Route::get('/member/add',[membersController::class,'showcreate']);

Route::post('/member',[membersController::class,'create']);

Route::get('/feedback',[membersController::class,'showfeedback']);



// show register/create form
Route::get("/register",[UserController::class,'create']);

Route::post("/users",[UserController::class,'store'])->name('createuser');

Route::post("/logout",[UserController::class,'logout']);



//show login form
Route::get("/login",[UserController::class,'login'])->name('login')->middleware("guest");

Route::post("users/authenticate",[UserController::class,'authenticate']);

Route::get("/verify-email/{user}",[UserController::class,'verifyEmailPage'])->name("verify.email.page");

Route::put("/verify-email/{user}",[UserController::class,'verifyEmail'])->name("verify.email");

// Route::prefix('admin')->group(function () {
//     Route::get('/users', function () {
//         // Matches The "/admin/users" URL
//     });
// });


//single listing
// Route::get('/listing/{id}',function($id){
//     $listing=Listings::find($id);
//     if($listing){
//         return view('listing',[
//             'listing'=>Listings::find($id)
//         ]);
//     }else{
//         abort("404");
//     }   
        
// });

// Route::get('/listing/{listing}',function(Listings $listing){
    
//     return view('listing',[
//         'listing'=>$listing
//     ]);
    
// });


Route::get("/h", function(){
    return view("welcome");   
});

Route::get("/demos",function(){
    return view("demo",
    [
        "fruits"=>[
            [
                'id'=>'1',
                'fruitname'=>'apple',
                'price'=>100
            ],
            [
                'id'=>'2',
                'fruitname'=>'banana',
                'price'=>200
            ],
            [
                'id'=>'3',
                'fruitname'=>'orange',
                'price'=>300
            ]
        ]
    ]);
});


route::get("/fruitdetail/{id}",function($id){
    $fruits=[
        [
            'id'=>'1',
            'fruitname'=>'apple',
            'price'=>100
        ],
        [
            'id'=>'2',
            'fruitname'=>'banana',
            'price'=>200
        ],
        [
            'id'=>'3',
            'fruitname'=>'orange',
            'price'=>300
        ]
        ];
        

        foreach($fruits as $fruit){
            if($fruit["id"]==$id){
                return $fruit;
            }
        }


});

Route::post("/function",function(Request $request){
    switch ($request->submit) {
        case 'plus':
            return response($request->num1."+".$request->num2."=".$request->num1+$request->num2);
            break;
        case 'minus':
            return response($request->num1."-".$request->num2."=".$request->num1-$request->num2);
            break;
        case 'multiply':
            return response($request->num1."*".$request->num2."=".$request->num1*$request->num2);
            break;
        case 'divide':
            return response($request->num1."/".$request->num2."=".$request->num1/$request->num2);
            break;
        default:
            return response("Invalid operation");
            break;
    }
});


Route::get("/form",function(){

    return view("form",[
        "demos"=>demotable::all()
    ]);
});



Route::get("/link", function(){
    return response("<a href='/links'>go</a>",200)
        ->header('content-Type','');
});

Route::get("/links", function(){
    return view("link");
});

Route::get("/posts/{id}",function($id){
    // dd($id);
    return response("Posts ".$id);
})->where('id',"[0-9]+");

Route::get("/look/{str}",function($str){
    return response("this is my word ".$str);
})->where('str',"[a-z]+");

Route::get("/search",function(Request $request){
    // dd($request->name,$request->age);

    return view("demo");
});




Route::get("/fruit",function(){
    // dd($request->name,$request->age);
    return view("fruit",[
        "fruits"=>fruit::all()
    ]);
    //SELECT * FROM fruits
});

Route::get("/search/{id}",function($id){
        
    $search=fruit::getFruitsbyvname($id);
    return view("search",[
        "search"=>$search
    ]);
    //SELECT * FROM fruits WHERE id=$id
});







