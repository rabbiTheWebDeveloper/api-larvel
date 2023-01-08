<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','shop_id','title','slug','page_content','theme','status'];
   
    protected $casts = [
        'user_id' => 'integer',
        'shop_id' => 'integer',
        'theme' => 'integer',
        'status' => 'integer'
    ];
}