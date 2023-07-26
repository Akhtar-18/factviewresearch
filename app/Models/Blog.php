<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $fillable = ['blog_category_id','heading','url','description','image','image_alt','schema','meta_title','meta_des','metal_keywords'];
    
}
