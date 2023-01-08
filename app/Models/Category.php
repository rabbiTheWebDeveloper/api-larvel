<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','description','parent_id','status'];

    public function category_image()
    {
        return $this->belongsTo(Media::class,'id','parent_id')->where('type','category');
    }
}
