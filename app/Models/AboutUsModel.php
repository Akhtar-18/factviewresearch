<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUsModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="about_us";

    protected $primaryKey = "id";
    protected $fillable = ['heading','content'];
}
