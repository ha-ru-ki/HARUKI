<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
 
    use SoftDeletes;

     function getPaginateByLimit(int $limit_count = 10)
   {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
   }
   
   protected $fillable = [
    'title',
    'body',
    'user_id',
   ];
   
   
     //Userに対するリレーション

     //「1対多」の関係なので単数系に
     public function user()
    {
    return $this->belongsTo('App\User');
    }

}
