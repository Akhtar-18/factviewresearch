<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestimonialModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="testimonials";
    protected $primaryKey = "id";
    protected $fillable = ['name','profile','comments','client_image'];
}
