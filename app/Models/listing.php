<?php 

namespace App\Models;

class Listing{
    public static function all(){
        return [
            [
                'id'=>1,
                'title'=>'Listing 3',
                'desc'=>'this is a good thing'
            ],
            [
                'id'=>2,
                'title'=>'Listing 4',
                'desc'=>'this is not a good thing'
            ]
            ];
    }

    public static function find($id){
        $listings=self::all();
        foreach($listings as $listing){
            if($listing["id"]==$id){
                return $listing;
            }
        }
    }
}

?>