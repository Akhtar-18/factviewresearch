<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSliderModel extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "homepagesliders";
    protected $primaryKey = "id";
    protected $fillable = ['heading', 'subheading', 'content', 'slider_image'];
}
