<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listings extends Model
{
    use HasFactory;
    
    protected $fillable=['title','user_id','company','logo','location','website','email','description','tag'];

    public function scopefilter($query,array $fillter){
        if($fillter["tag"] ?? false){
            $query->where('tag','like','%'.request('tag').'%');
        }

        if($fillter["search"] ?? false){
            $query->where('title','like','%'.request('search').'%')
            ->orwhere('description','like','%'.request('search').'%')
            ->orwhere('tag','like','%'.request('search').'%');
        }
    }
    

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public static function updatebyid($id,$data)
    {
        $query="update listings set title=:title,company=:company,logo=:logo,location=:location,website=:website,email=:email,description=:description,tag=:tag where id=:id";
        $result=listings::where('id',$id)->update($data);
        return $result;
    }

    
}
