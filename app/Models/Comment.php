<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Post;
use App\models\User;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    
    protected $fillable = [
        'id','post_id','user_id','subject','comment','is_delete','created_at','updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
    
    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }
    
}