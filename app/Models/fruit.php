<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class fruit extends Model
{
    use HasFactory;

    public static function getFruitsbyvname($name){
        $query="SELECT * FROM fruits WHERE v_name='$name' limit 1";
        $result=DB::select($query);
        return $result;
    }

    
}
